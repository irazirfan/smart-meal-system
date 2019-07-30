<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(Request $request){

    	$request->session()->flush();
    	//$request->session()->forget('logged');

    	return redirect()->route('login');

    }
}
