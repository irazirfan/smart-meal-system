<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class HomeController extends Controller
{

	// public function validSession($req){

	// 	if($req->session()->has('user')){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

 //    public function login(Request $req){
		
	// 	if($this->validSession($req)){
	// 		return view('home/login');
	// 	}else{
	// 		return redirect()->route('login');
	// 	}
 //    }

    public function register(){

    	return view('home/register');
    }

    public function signup(Request $req){

        $validator = Validator::make($req->all(), [

            "name"      => "required",
            "email"     => "required | unique:users,email",
            "password"  => "required|min:4",
            "user_type" => "required"
        ]);

        if($validator->fails()){

            return back()
                    ->with('errors', $validator->errors())
                    ->withInput();
        }

    	$user = new User();
        $user->name = $req->name;
    	$user->email = $req->email;
    	$user->password = $req->password;
    	$user->user_type = $req->user_type;
    	$user->save();

    	return view('login.login');
    }

	public function details($id){

		$std = User::find($id);
		
		return view('home.details', ['std'=>$std]);
    }

    public function show(){

    	$stdList = User::all();
    	return view('home.stdlist', ['std'=> $stdList]);
    }
	
	public function edit($id){

		$std = User::find($id);
		return view('home.edit', ['std'=>$std]);
    }

    public function update(Request $req, $id){

    	$user = User::find($id);

    	$user->username = $req->uname;
    	$user->name = $req->name;
    	$user->dept = $req->dept;
    	$user->cgpa = $req->cgpa;
    	$user->save();

		return redirect()->route('home.stdlist');
    }
	public function delete($id){

		$std = User::find($id);
		return view('home.delete', ['std'=>$std]);
    }

    public function destroy($id){

		User::destroy($id);
		return redirect()->route('home.stdlist');
	}

    public function about(){

        return view('home/about');
    }

    public function contact(){

        return view('home/contact');
    }

    public function index(){

        return view('home.index');
    }
}