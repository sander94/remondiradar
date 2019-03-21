<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




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
        $workrooms = DB::table('wr')->where('company_id', $user->id)->get();
        return view('admin.admin')->with('workrooms', $workrooms);

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







}
