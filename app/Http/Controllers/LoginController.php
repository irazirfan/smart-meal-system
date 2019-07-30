<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   
	public function login(){	

		return view('login/login');
	}

	public function verify(Request $req){	

		$result = DB::table('users')->where('email', $req->email)
				->where('password', $req->password)
				->get();
		
		if(count($result) > 0){

			$req->session()->put('user', $req->email);
			return redirect()->route('home.index');
		}else{
			$req->session()->flash('msg', 'invalid email or password');
			return view('login/login');
		}
	}
}