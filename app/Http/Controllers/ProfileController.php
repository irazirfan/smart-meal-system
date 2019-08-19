<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {

        $email = session('user');

		$result = User::where('email', $email)->first();

		return view('profile/edit', ['result'=> $result]);

    }

    public function update(Request $req){

        $email = session('user');
    	$user = User::where('email', $email)->first();

    	$user->name = $req->name;
    	$user->password = $req->password;
    	$user->save();

		return redirect()->route('profile.edit');
    }

}
