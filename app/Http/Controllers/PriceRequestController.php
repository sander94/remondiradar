<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceRequests;
use Illuminate\Support\Facades\DB;
use App\Regions;


class PriceRequestController extends Controller
{



    function index(Request $request) {
    	
        
   		$regions = Regions::all();
    	return view('pricerequest', compact('regions'))->with(['title' => 'Küsi remonditöö hinda | Remondiradar.ee', 'og_image' => '']);
    }

    function post(Request $request) {

   	 PriceRequests::create($request->all());
   	 return redirect()->back()->with('message', 'IT WORKS!');
    }




}
