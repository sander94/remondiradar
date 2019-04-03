<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\PriceRequests;
use App\User;
use App\PriceRequestsAnswers;
use App\Mail\AnswerToPriceRequest;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index() {

        $user = auth()->user();
        $date = \Carbon\Carbon::today()->subDays(14);
        $workrooms = DB::table('wr')->where('company_id', $user->id)->get();


        // if company (user) has any workrooms in the same area that request is from
        // So that they wouldn't see requests from China 
        // Compamies only see requests from areas that they have workrooms in
        // So we have to check which areas this company has workrooms in, and show only these requests with same region.

        // Create an array of in which regions a company has workrooms in
        $wr_array = array();
        foreach($workrooms as $wr) {
            array_push($wr_array, $wr->region);
        }

        // Select only these regions that company has workrooms in
        $pricerequests = PriceRequests::whereIn('region', $wr_array)->where('created_at', '>=', $date)->orderBy('id', 'asc')->paginate(10);


        // Here we make the list of answered and unanswered price requests. Echo it out in view file.
        // We make it here because we need to check if it is answered or not and show the result accordingly.
        $line = "";

            foreach($pricerequests as $pricerequest) {
         
            if($pricerequest->region == '1') { $requestRegion = 'Pärnu'; } 
            if($pricerequest->region == '2') { $requestRegion = 'Tallinn'; } 
            if($pricerequest->region == '3') { $requestRegion = 'Tartu'; } 
           

            $line .= "
                <tr>
                    
 
                    <td> ". $pricerequest->year ." ". $pricerequest->make ." ". $pricerequest->model ." </td>
                    <td> ". $pricerequest->engine ." ". $pricerequest->kw ." kW </td>
                    <td> ". $requestRegion ." </td>
                    <td> ". $pricerequest->created_at->format('d.m.Y') ." </td>
                    <td> ";
                    // IF company has answered it already, show another button
                    if( PriceRequestsAnswers::where(['request_id' => $pricerequest->id, 'answered_by' => Auth::user()->id])->exists() ) { 

                        $line .= "
                        <a href=\"/admin/requests/". $pricerequest->id ."\" class=\"btn btn-secondary mybtn\"  style='color: #cecece;'> <i class='far fa-eye fa-fw'> </i> Vaata pakkumist</a>";
                    }

                    // Else if the request is unanswered, show default button (answer that request)
                     else { 
                        $line .= "
                        <a href=\"/admin/requests/". $pricerequest->id ."\" class=\"btn btn-success mybtn\"> <strong> <i class='fas fa-wrench fa-fw'> </i> Paku hind </strong></a>";
                    }



                    $line .= "
                    </td>
                    
                </tr>";

           }






        return view('admin.admin')->with('workrooms', $workrooms)->with('pricerequests', $pricerequests)->with('lines', $line);

    }



    public function admin()
    {
        $user = auth()->user();
        $workrooms = DB::table('wr')->where('company_id', $user->id)->get();
        return view('admin.admin')->with('workrooms', $workrooms);
    }

    public function company_data()
    {
        
        return view('admin.company-data');
    }


// SHOW PRICE REQUEST WHEN LINK IS CLICKED
    public function requestsShow(Request $request) {

        $pricerequest = PriceRequests::where('id', $request->id)->first();

        if( PriceRequestsAnswers::where(['request_id' => $pricerequest->id, 'answered_by' => Auth::user()->id])->exists() ) { 
            $companyHasAnswered = true; 
        }
        else { $companyHasAnswered = false; 
        }

   
        return view('admin.pricerequests.makeoffer')->with('pricerequest', $pricerequest)->with('companyHasAnswered', $companyHasAnswered);

    }


// WHEN ADMIN SENDS A PRICE REQUEST, IT GOES TO CLIENT'S EMAIL
    public function requestsPost(Request $request) {
        
        $pricerequest = PriceRequests::where('id', $request->id)->first();



       

        // Send email to potential customer
            $mailable = new AnswerToPriceRequest;
            $mailable->replyTo(Auth::user()->email);
            $mailable->from('info@remondiradar.ee', Auth::user()->name);
            $mailable->subject('Vastus hinnapäringule');

            \Mail::to($pricerequest->email)
              ->send($mailable);




       // \Mail::to($pricerequest->email)->replyTo('jrgnssndr@gmail.com')->send(new AnswerToPriceRequest);






        $dataInsert = array('request_id' => $request->id, 'answered_by' => Auth::user()->id, 'answer' => $request->answer);
        PriceRequestsAnswers::create($dataInsert);

        return redirect()->back()->with('successmsg', 'Pakkumine saadetud!');

    }


}
