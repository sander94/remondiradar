<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceRequests;
use Illuminate\Support\Facades\DB;


class PriceRequestController extends Controller
{



    function index(Request $request) {
    	
        
   		
    	return view('pricerequest')->with('region', '0');
    }

    function post(Request $request) {

   	 PriceRequests::create($request->all());
   	 return redirect()->back()->with('message', 'IT WORKS!');
    }




}
