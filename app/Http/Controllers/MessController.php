<?php

namespace App\Http\Controllers;

use App\Mess;
use App\User;
use Validator;
use Illuminate\Http\Request;

class MessController extends Controller
{
    public function mess()
    {
        return view('mess/mess');
    }

    public function Create()
    {
        return view('mess/add');
    }

    public function Add(Request $req)
    {
        $validator = Validator::make($req->all(), [

            "mess_name"      => "required",
        ]);

        if($validator->fails()){

            return back()
                ->with('errors', $validator->errors())
                ->withInput();
        }

        $mess = new Mess();
        $mess->name = $req->mess_name;
        $mess->save();

        $id = Mess::latest()->first()->id;

        $user = User::where('email', session('user'))->first();
        $user->mess_id = $id;
        $user->status = "invited";
        $user->save();

        return view('mess/mess');
    }
}
