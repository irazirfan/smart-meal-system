<?php

namespace App\Http\Controllers;

use App\User;
use App\Meal;
use App\Expense;
use Illuminate\Http\Request;

class MealCalccontroller extends Controller
{
    public function calculation(){

        $user = User::where('email', session('user'))->first();

        $mess_id = $user->mess_id;
        $names = User::where('mess_id', $mess_id)
            ->where('status','!=','invited')
            ->get();

//        dd($names);

        $meals = Meal::where('meals.mess_id', session('mess_id'))
            ->join('users', 'meals.email', '=', 'users.email')
            ->select('meals.*','users.name')
            ->orderby('date', 'asc')
            ->get();

        $expense = Expense::all();
//        dd($expense);

        $e_users = [];
        foreach($names as $values){
            foreach ($expense as $data){
                if($values->email == $data->email){
                    array_push($e_users, $data->amount);
                }
            }
        }

        $total_amount = array_sum($e_users);



        $total_meal_user_wise = [];
        $total_meal = 0;

        for ($i=0; $i<count($meals); $i++){
            $total_user_meal = 0;
            $total_user_meal = $total_user_meal + $meals[$i]->breakfast + $meals[$i]->lunch + $meals[$i]->dinner;
            $total_meal = $total_meal + $total_user_meal;
            array_push($total_meal_user_wise, $total_user_meal);
        }
//        dd($total_meal_user_wise);

//        $total_meal = array_sum($total_meal_user_wise);

        $meal_rate = $total_amount / $total_meal;




        return view('calculation/calculation', ['user'=>$user, 'name_list'=>$names, "meals"=>$meals,
            "total_meal"=>$total_meal,"total_meal_user_wise"=>$total_meal_user_wise, 'amounts'=>$e_users, 'meal_rate'=>$meal_rate]);
    }
}
