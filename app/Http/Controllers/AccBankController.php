<?php

namespace App\Http\Controllers;

use App\Models\ReceivingAccountBank;
use Illuminate\Http\Request;

class AccBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank = ReceivingAccountBank::get()->first();
        return response()->json($bank);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bank = new ReceivingAccountBank;
        $bank->Bank_Name = 'Bank Islam';
        $bank->number_account = '1212 2010 011759';
        $bank->account_name = 'TETUAN HAMSHA BEAULICIOUS & CAFE';
        $bank->save();
        return response()->json($bank);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $oldAcc = ReceivingAccountBank::first();

        if($oldAcc){
            $oldAcc->account_name = $request->input('account_number');
            $oldAcc->Bank_Name = $request->input('Bank_Name');
            $oldAcc->account_name = $request->input('account_name');
            $oldAcc->save();
            return response()->json(['message' => $oldAcc]);
        }else{
            return response()->json(['message' => 'Error getting the account/Account not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
