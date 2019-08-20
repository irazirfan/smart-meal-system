<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MealCalccontroller extends Controller
{
    public function calculation(){

        $user = User::where('email', session('user'))->first();

        $mess_id = $user->mess_id;
        $names = User::where('mess_id', $mess_id)
            ->where('status','!=','invited')
            ->get();

        return view('calculation/calculation', ['user'=>$user, 'name_list'=>$names]);
    }
}
