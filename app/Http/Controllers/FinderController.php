<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workroom;
use App\Finder;
use App\Timeslots;
use Illuminate\Support\Facades\DB;


class FinderController extends Controller
{
   public function index(Request $request) {
   


   		$workrooms = Workroom::all()->where('region', $request->region)->where('is_active', '1')->where('is_verified', '1');
        return view('finder', compact('workrooms'))->with(['region' => request()->region]);
      
    
   }



      public function show(Request $request) {



  	 // get the first one to show on page
   		$workroom = Workroom::all()->where('id', $request->id)->where('is_active', '1')->first();
		
    

    if(!empty ($workroom->company_id)){
        
                	 // get company name
                		$company_name = DB::table('users')->where('id', $workroom->company_id)->first();
                		$company_realname = $company_name->name;
                  
                	 // calculate view count
                   		$newViewCount = $workroom->view_count+1;

                		  Workroom::where('id', $request->id)->update(array(
                		  	   	'view_count' => $newViewCount
                		  	   ));

                   		$region = $workroom->region;
   
          return view('show', compact('workroom', 'timeslots'))->with(['id' => request()->id, 'region' => $region, 'company_realname' => $company_realname]);
    }


    else {
      return redirect()->route('home');
    }




        
   }
}
