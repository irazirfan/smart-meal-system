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
        $user = User::where('email', session('user'))->first();

        return view('mess/mess' , ['user' => $user]);
    }

    public function Create()
    {
        $user = User::where('email', session('user'))->first();

        return view('mess/add', ['user'=> $user]);
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

        return redirect()->route('mess.mess');
    }

    public function viewMember()
    {
        $user = User::where('email', session('user'))->first();

        $mess_id = $user->mess_id;
        $result = User::where('mess_id', $mess_id)
                        ->where('status','!=','invited')
                        ->get();

        return view('mess.view-member', ['result'=>$result,'user'=>$user]);
    }

    public function invitation($id)
    {
        $result = Mess::where('id', $id)
            ->first();

        $user = User::where('email', session('user'))->first();

        return view('mess.invitation', ['result'=>$result, 'user'=> $user]);
    }

    public function accept(Request $req, $id)
    {
        $user = User::where('email', session('user'))->first();
        $user->status = 0;
        $user->save();

        $req.session()->put('status', 0);
        $req.session()->put('mess_id', $id);

        return redirect()->route('mess.mess');
    }
}
