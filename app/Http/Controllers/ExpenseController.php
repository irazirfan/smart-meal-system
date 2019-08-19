<?php

namespace App\Http\Controllers;

use App\Expense;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class ExpenseController extends Controller
{
    public function expense()
    {
        $expenseList= DB::table('expenses')
            ->join('users', 'expenses.email', '=' ,'users.email')
            ->select('expenses.*', 'users.name')
            ->get();

        $user = User::where('email', session('user'))->first();

        return view('expense.expense', ['result'=> $expenseList, 'user'=> $user]);
    }

    public function add(Request $req)
    {
        $validator = Validator::make($req->all(), [

            "amount" => "required",
            "date"   => "required",
        ]);

        if($validator->fails()){

            return back()
                ->with('errors', $validator->errors())
                ->withInput();
        }

        $expense = new Expense();
        $expense->amount = $req->amount;
        $expense->email = session('user');
        $expense->item = $req->item;
        $expense->date = $req->date;
        $expense->save();

        return redirect()->route('expense.expense');
    }

}
