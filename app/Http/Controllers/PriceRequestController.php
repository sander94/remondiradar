<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceRequests;
use Illuminate\Support\Facades\DB;
use App\Regions;
use App\Workroom;
use App\User;
use App\Mail\PriceRequestNotification;



class PriceRequestController extends Controller
{



    function index(Request $request) {
    	
        
   		$regions = Regions::all();
    	return view('pricerequest', compact('regions'))->with(['title' => 'Küsi remonditöö hinda | Remondiradar.ee', 'og_image' => '']);
    }

    function post(Request $request) {

   	 

   	 // GET ALL WORKROOMS FROM THIS REGION WHO WANT EMAILS
   	 // GET THEIR COMPANY EMAILS
   	 // SEND EMAILS


/** THIS PART NEEDS TO BE REWRITTEN
* It selects all workrooms that are verified and active in requested region
* Then gets the usernames, who are the owners of these workrooms
* Then gets an array of those emails
*/




   	//  SELECT ALL WORKROOMS FROM THIS REGION
   	 $wrs = Workroom::where(['region' => $request->region, 'is_active' => '1', 'is_verified' => '1'])->get();
   	 $email_array = array();

   	 	// FOR EVERY WORKROOM GO THROUGH LOOP AND FIND CORRESPONDING USERS
   		foreach($wrs as $wr) {
   			$thisUser = User::where('id', $wr->company_id)->first();

   			if($thisUser->pricerequest_email_to_user == '1') { // If user allows sending email notification
   				array_push($email_array, $thisUser->email); // Push email to array
   			}
   		} 

   		// Make array unique with no repeating emails
   		$email_array = array_unique($email_array);


   		// now send mails to these emails
   		for($i = 0; $i<count($email_array); $i++) {	

        // Send email to users
           $mailable = new PriceRequestNotification;
            $mailable->from('info@remondiradar.ee', 'Remondiradar.ee');
            $mailable->subject('Uus hinnapäring');

            \Mail::to($email_array[$i])
              ->send($mailable); 
             

   			// SEND IT
   		}


		PriceRequests::create($request->all());


   	  return redirect()->back()->with('message', 'IT WORKS!');
    }




}

