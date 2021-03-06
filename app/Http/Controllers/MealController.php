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
                    ->orderby('date', 'asc')
                    ->get();

        $mess_id = $user->mess_id;
        $names = User::where('mess_id', $mess_id)
            ->where('status','!=','invited')
            ->get();


        return view('meal/meal', ['user' => $user, 'meal' => $meal, 'meals' => $meals, 'names' => $names]);
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
            //$meal->date = new DateTime('+2 day');
            //$meal->email = session('user');
            //$meal->mess_id = session('mess_id');

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

        $user = User::where('email', session('user'))->first();

        return view('meal/meal', ['user' => $user, 'meal' => $meal]);
    }

    public function tomorrow(){
        $date =  new DateTime('+2 days');
        $date = $date->format("Y-m-d");
        $user = User::where('email', session('user'))->first();
        $tomorrow_meal = Meal::where('mess_id', $user->mess_id)
            ->where('date', $date)
            ->get();

//        dd($tomorrow_meal);
        $total = 0;
        foreach ($tomorrow_meal as $val){
            $total = $total + $val->breakfast + $val->lunch + $val->dinner;
        }

        return view('meal/tomorrow', ['user'=>$user, 'tomorrow_meal'=>$total]);
    }
}
