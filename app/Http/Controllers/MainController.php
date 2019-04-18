<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workroom;
use App\Finder;
use App\Regions;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
   public function index(Request $request) {
   

   		if(empty($request->region)) {
        $request->region = 1;
   		}
   		
   		$workrooms = Workroom::all()->where('region', $request->region)->where('is_active', '1')->where('is_verified', '1');
   		
      // Make title tag for page
      $regionName = Regions::where('id', $request->region)->first();
   //    $title = $regionName->region_name.' - '.count($workrooms).' remonditöökoda | Remondiradar.ee';
      $title = "Remondiradar.ee - Leia kiirelt kohalik remonditöökoda.";
      $og_image = asset('images/web/logo-white.png');

      return view('frontpage', compact('workrooms'))->with(['region' => request()->region, 'title' => $title, 'og_image' => $og_image]);
      
    
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
   
                  $title = $workroom->brand_name.' | Remondiradar.ee';
                  $og_image = asset('images/t_logos/'.$workroom->brand_logo.'');

          return view('show2', compact('workroom'))->with(['id' => request()->id, 'region' => $region, 'company_realname' => $company_realname, 'title' => $title, 'og_image' => $og_image]);
    }


    else {
      return redirect()->route('frontpage');
    }
        
}


    public function aboutUs() {
      return view('aboutUs')->with(['og_image' => '', 'title' => 'Meie missioon | Remondiradar.ee', 'region' => '']);
    }






}
