<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ChangePasswordController extends Controller
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



    public function index () {

       return view('admin.change-password');

    }


    public function updatePassword (Request $request) {

        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)) {

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin')->with('successMsg', "Parooli vahetamine õnnestus!");

        }

        else {

            return redirect()->back()->with('errorMsg', 'Valesti sisestatud hetkel kehtiv parool!');

        }
    }





}
