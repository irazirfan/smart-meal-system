<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class LoginController extends Controller
{

	public function login(){

		return view('login/login');
	}

	public function verify(Request $req){

		$validator = Validator::make($req->all(), [

            "email"     => "required",
            "password"  => "required"

        ]);

        if($validator->fails()){

            return back()
                    ->with('errors', $validator->errors())
                    ->withInput();
        }

        else{

        	$result = User::where('email', $req->email)
        			->where('password', $req->password)
        			->first();

			if($result) {

				$req->session()->put('user', $req->email);
                $req->session()->put('name', $result->name);
                $req->session()->put('mess_id', $result->mess_id);
                $req->session()->put('status', $result->status);
                $req->session()->put('user_type', $result->user_type);

				return redirect()->route('mess.mess');
			}else{
				$req->session()->flash('msg', 'invalid email or password');
				return redirect()->route('login');
			}

        }
    }
}
