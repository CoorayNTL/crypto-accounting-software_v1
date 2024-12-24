<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return response()->json($transactions, 200);
    }


    function store(Request $request)
    {
        $request->validate([
            'crypto_id' => 'required',
            'amount' => 'required',
            'transaction_type' => 'required',
            'price_at_time' => 'required',
            'status' => 'required',
            'transaction_date' => 'required',
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'crypto_id' => $request->crypto_id,
            'amount' => $request->amount,
            'transaction_type' => $request->transaction_type,
            'price_at_time' => $request->price_at_time,
            'status' => $request->status,
            'transaction_date' => $request->transaction_date,
        ]);
        return response()->json($transaction, 201);
    }

    function show($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->find($id);
        if ($transaction) {
            return response()->json($transaction, 200);
        } else {
            return response()->json(['message' => 'Record not found.'], 404);
        }
    }
}
