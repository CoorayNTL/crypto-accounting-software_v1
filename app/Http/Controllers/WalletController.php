<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::where('user_id', Auth::id())->with('crypto')->get();
        return response()->json($wallets, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'crypto_id' => 'required|exists:crypto_prices,id',
            'balance' => 'required|numeric|min:0',
            'wallet_address' => 'required|string|unique:wallets,wallet_address',
        ]);

        $wallet = Wallet::create([
            'user_id' => Auth::id(),
            'crypto_id' => $request->crypto_id,
            'balance' => $request->balance,
            'wallet_address' => $request->wallet_address,
        ]);

        return response()->json($wallet, 201);
    }

    public function show($id)
    {
        $wallet = Wallet::where('user_id', Auth::id())->with('crypto')->find($id);

        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found'], 404);
        }

        return response()->json($wallet, 200);
    }

    public function update(Request $request, $id)
    {
        $wallet = Wallet::where('user_id', Auth::id())->find($id);

        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found'], 404);
        }

        $request->validate([
            'balance' => 'sometimes|numeric|min:0',
            'wallet_address' => 'sometimes|string|unique:wallets,wallet_address,' . $wallet->id,
        ]);

        $wallet->update([
            'balance' => $request->balance ?? $wallet->balance,
            'wallet_address' => $request->wallet_address ?? $wallet->wallet_address,
        ]);

        return response()->json($wallet, 200);
    }

    public function destroy($id)
    {
        $wallet = Wallet::where('user_id', Auth::id())->find($id);

        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found'], 404);
        }

        $wallet->delete();

        return response()->json(['message' => 'Wallet deleted successfully'], 200);
    }
}
