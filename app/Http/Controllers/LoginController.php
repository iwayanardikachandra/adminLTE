<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin (Request $request){
        // dd($request->all());

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/beranda');
        }

        //Alert in the body
        // return redirect('login')->with('error', 'Invalid credentials');;

        //Pop Up Alert
        // return redirect('login?error=true');

        return redirect('login?error=Invalid,+Try+Again');

    }

    public function logout (Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
