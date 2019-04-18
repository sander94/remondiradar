<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DataInsertion extends Controller
{



    public function company_data(Request $request) {


    	$user = auth()->user();


		$user->fill($request->all())->save();

    	return view('admin.company-data');

    }



    public function workroom_update(Request $request) {
    	
    	$user = auth()->user();
        $pageid = $request->id; // page id


    	// $user->fill($request->all())->save();
    	//  $currentWorkroomData = DB::table('wr')->where('id', $id)->where('company_id', $user->id)->get()->first();
    	DB::table('wr')->where('id', $pageid)->update([
            'brand_name' => $request->brand_name,
            'brand_logo' => $request->brand_logo,
            'full_address' => $request->full_address

        ]);


    	$currentWorkroomData = DB::table('wr')->where('id', $pageid)->where('company_id', $user->id)->get()->first();
    	return view('admin.workroom-crud')->with('currentWorkroom', $currentWorkroomData);

    }


}
