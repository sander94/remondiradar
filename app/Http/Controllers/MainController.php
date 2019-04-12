<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workroom;
use App\Finder;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
   public function index(Request $request) {
   

   		if(empty($request->region)) {
        $request->region = 1;
   		}
   		
   		$workrooms = Workroom::all()->where('region', $request->region)->where('is_active', '1')->where('is_verified', '1');
   		
        return view('frontpage', compact('workrooms'))->with(['region' => request()->region]);
      
    
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
   
          return view('show2', compact('workroom'))->with(['id' => request()->id, 'region' => $region, 'company_realname' => $company_realname]);
    }


    else {
      return redirect()->route('frontpage');
    }




        
   }
}
