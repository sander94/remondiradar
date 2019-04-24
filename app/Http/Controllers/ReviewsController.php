<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\SendReviewRequestEmail;
use App\Workroom;
use Illuminate\Support\Str;
use App\Reviews;
use App\User;

class ReviewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index() {
        $workrooms = Workroom::where('company_id', Auth::user()->id)->get();
    	return view('admin.reviews.index', compact('workrooms'));
    }



    public function sendReviewRequest(Request $request) {


        $token = (string) Str::orderedUuid();
        $review = new Reviews;
            
        $review->token = $token;
        $review->is_active = 0;
        $review->reviewer_email = $request->reviewer_email;
        $review->wr_id = $request->wr_id;
        $review->save();





    	   $mailable = new SendReviewRequestEmail($token);
            $mailable->from('info@remondiradar.ee', 'Remondiradar.ee');
            $mailable->subject('Aitäh külastamast!');


            \Mail::to($request->reviewer_email)
              ->send($mailable); 


    }
}
