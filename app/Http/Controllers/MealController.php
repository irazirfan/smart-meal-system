<?php

namespace App\Http\Controllers;
use App\User;
use App\Meal;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{
    public function meal()
    {
        $user = User::where('email', session('user'))->first();

        $meal = Meal::where('email', session('user'))->first();

        $meals = Meal::where('meals.mess_id', session('mess_id'))
                    ->join('users', 'meals.email', '=', 'users.email')
                    ->select('meals.*','users.name')


        return view('meal/meal', ['user' => $user, 'meal' => $meal, 'meals' => $meals]);
    }

    public function update(Request $req)
    {
        $date =  new DateTime('+2 days');
        $date = $date->format("Y-m-d");
        $email = session('user');

        $meal = Meal::where('email', $email)
            ->where('date', $date)
            ->first();
        //dd($meal);
        if($meal) {
            $meal->date = new DateTime('+2 day');
            $meal->email = session('user');
            $meal->mess_id = session('mess_id');

            if($req->breakfast == "on" )
                $meal->breakfast = 1;
            else
                $meal->breakfast = 0;
            if($req->lunch == "on" )
                $meal->lunch = 1;
            else
                $meal->lunch = 0;
            if($req->dinner == "on" )
                $meal->dinner = 1;
            else
                $meal->dinner = 0;

            $meal->save();
        }

        else {
            $meal = new Meal();
            $meal->date = new DateTime('+1 day');
            $meal->email = session('user');
            $meal->mess_id = session('mess_id');

            if($req->breakfast == "on" )
                $meal->breakfast = 1;
            else
                $meal->breakfast = 0;
            if($req->lunch == "on" )
                $meal->lunch = 1;
            else
                $meal->lunch = 0;
            if($req->dinner == "on" )
                $meal->dinner = 1;
            else
                $meal->dinner = 0;

            $meal->save();
        }

        $user = User::where('email', session('user'))->first();

        return view('meal/meal', ['user' => $user, 'meal' => $meal]);
    }
}
