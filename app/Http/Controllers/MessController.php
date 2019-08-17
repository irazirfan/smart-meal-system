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
        $user->status = null;
        $user->save();

        return view('mess/mess');
    }

    public function viewMember($id)
    {
        $result = User::where('mess_id', $id)
                        ->where('status','NOT LIKE','invited')
                        ->get();

        return view('mess.view-member', ['result'=>$result]);
    }

    public function invitation($id)
    {
        $result = Mess::where('id', $id)
            ->first();

        return view('mess.invitation', ['result'=>$result]);
    }

    public function accept($id)
    {
        session()->forget('mess_id');
        session()->forget('status');

        $user = User::where('email', session('user'))->first();
        $user->status = 0;
        $user->save();

        session()->put('status', 0);
        session()->put('mess_id', $id);

        return redirect()->route('mess.mess');
    }
}
