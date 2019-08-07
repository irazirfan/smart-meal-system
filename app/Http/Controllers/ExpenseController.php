<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function expense()
    {
        $expenseList= DB::table('expenses')
            ->join('users', 'expenses.email', '=' ,'users.email')
            ->select('expenses.*', 'users.name')
            ->get();
        return view('expense.expense', ['result'=> $expenseList]);
    }
}
