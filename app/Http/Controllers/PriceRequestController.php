<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceRequests;
use Illuminate\Support\Facades\DB;


class PriceRequestController extends Controller
{



    function index() {
    	return view('pricerequest');
    }

    function post(Request $request) {

   	 PriceRequests::create($request->all());
   	 return redirect()->back()->with('message', 'IT WORKS!');
    }




}
