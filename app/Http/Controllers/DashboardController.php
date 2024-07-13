<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exprnse;

class DashboardController extends Controller
{
    public function index(){
        $incomes = Exprnse::where('user_id',auth()->id())->where('type',1)->sum('amount');
        $expense = Exprnse::where('user_id',auth()->id())->where('type',2)->sum('amount');
        return view('dashboard',compact('expense','incomes'));
    }

    public function exprnseReport(){

        return view('report');
    }
}
