<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exprnse;
use App\Exports\ExpenseReportExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(){
        $incomes = Exprnse::where('user_id',auth()->id())->where('type',1)->sum('amount');
        $expense = Exprnse::where('user_id',auth()->id())->where('type',2)->sum('amount');
        return view('dashboard',compact('expense','incomes'));
    }

    public function exprnseReport(Request $request){
        $exprnses = Exprnse::where('user_id',auth()->id());
        if(!empty($request->type)){
            $exprnses->where('type',$request->type);
        }
        $exprnses = $exprnses->paginate(10);
        
        return view('report',compact('exprnses'));
    }

    public function export()
    {
        return Excel::download(new ExpenseReportExport, 'exprnses.xlsx');
    }
}
