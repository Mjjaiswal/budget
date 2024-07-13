<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exprnse;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exprnses = Exprnse::where('user_id',auth()->id())->paginate(10);
        return view('expense.list',compact('exprnses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'         => 'required|string|max:255',
            'date'         => 'required|date',
            'amount'       => 'required',
            'description'  => 'required|string'
        ]);


        $saveData['user_id']       = auth()->id();
        $saveData['type']          = $request->type;
        $saveData['date']          = $request->date;
        $saveData['amount']        = $request->amount;
        $saveData['description']   = $request->description;

        $expense = Exprnse::create($saveData);
        if($expense){
            return redirect()->route('expense.index')->with('success', 'Expense created successfully.');
        }
        return redirect()->route('expense.index')->with('error', "Can't create Expense !!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exprnse $expense)
    {
        if($expense->user_id == auth()->id()){
            return view('expense.update',compact('expense'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exprnse $expense)
    {
        if($expense->user_id == auth()->id()){
            $request->validate([
                'type'         => 'required|string|max:255',
                'date'         => 'required|date',
                'amount'       => 'required',
                'description'  => 'required|string'
            ]);

            $updateData['type']          = $request->type;
            $updateData['date']          = $request->date;
            $updateData['amount']        = $request->amount;
            $updateData['description']   = $request->description;

            $expense->update($updateData);
            return redirect()->route('expense.index')->with('success', 'Expense updated successfully.');
        }else{
            return redirect()->route('expense.index')->with('error', "Can't update expense !!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exprnse $expense)
    {
        if($expense->user_id == auth()->id()){
            $expense->delete();
            return redirect()->route('expense.index')->with('success', 'Expense deleted successfully.');
        }else{
            return redirect()->route('expense.index')->with('error', "Can't delete expense !!");
        }
    }
}
