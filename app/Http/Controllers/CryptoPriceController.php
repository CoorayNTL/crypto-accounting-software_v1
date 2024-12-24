<?php

namespace App\Http\Controllers;

use App\Models\CryptoPrice;
use Illuminate\Http\Request;

class CryptoPriceController extends Controller
{
    public function index()
    {
        $cryptoPrices = CryptoPrice::all();
        return response()->json($cryptoPrices, 200);
    }

    public function store(Request $request) //Currency symbol can create only one time can not create duplicate currency symbol
    {
        $request->validate([
            'symbol' => 'required|string|max:10|unique:crypto_prices,symbol',
            'name' => 'required|string|max:255',
            'current_price' => 'required|numeric',
            'market_cap' => 'required|numeric',
            '24h_change' => 'required|numeric',
        ]);

        try {
            $cryptoPrice = CryptoPrice::create([
                'symbol' => $request->symbol,
                'name' => $request->name,
                'current_price' => $request->current_price,
                'market_cap' => $request->market_cap,
                '24h_change' => $request->{'24h_change'},
                'last_updated' => now(),
            ]);

            return response()->json($cryptoPrice, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $cryptoPrice = CryptoPrice::find($id);

        if ($cryptoPrice) {
            return response()->json($cryptoPrice, 200);
        } else {
            return response()->json(['message' => 'Cryptocurrency not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $cryptoPrice = CryptoPrice::find($id);

        if (!$cryptoPrice) {
            return response()->json(['message' => 'Cryptocurrency not found'], 404);
        }

        $request->validate([
            'symbol' => 'sometimes|string|max:10|unique:crypto_prices,symbol,' . $cryptoPrice->id,
            'name' => 'sometimes|string|max:255',
            'current_price' => 'sometimes|numeric',
            'market_cap' => 'sometimes|numeric',
            '24h_change' => 'sometimes|numeric',
        ]);

        $cryptoPrice->update([
            'symbol' => $request->symbol ?? $cryptoPrice->symbol,
            'name' => $request->name ?? $cryptoPrice->name,
            'current_price' => $request->current_price ?? $cryptoPrice->current_price,
            'market_cap' => $request->market_cap ?? $cryptoPrice->market_cap,
            '24h_change' => $request->{'24h_change'} ?? $cryptoPrice->{'24h_change'},
            'last_updated' => now(),
        ]);

        return response()->json($cryptoPrice, 200);
    }

    public function destroy($id)
    {
        $cryptoPrice = CryptoPrice::find($id);

        if (!$cryptoPrice) {
            return response()->json(['message' => 'Cryptocurrency not found'], 404);
        }

        $cryptoPrice->delete();

        return response()->json(['message' => 'Cryptocurrency deleted successfully'], 200);
    }

    /**
     * Get all transactions associated with a specific cryptocurrency.
     */
    public function transactions($id)
    {
        $cryptoPrice = CryptoPrice::find($id);

        if (!$cryptoPrice) {
            return response()->json(['message' => 'Cryptocurrency not found'], 404);
        }

        $transactions = $cryptoPrice->transactions;
        return response()->json($transactions, 200);
    }

    /**
     * Get all portfolios containing a specific cryptocurrency.
     */
    public function portfolios($id)
    {
        $cryptoPrice = CryptoPrice::find($id);

        if (!$cryptoPrice) {
            return response()->json(['message' => 'Cryptocurrency not found'], 404);
        }

        $portfolios = $cryptoPrice->portfolios;
        return response()->json($portfolios, 200);
    }

    /**
     * Get all wallets holding a specific cryptocurrency.
     */
    public function wallets($id)
    {
        $cryptoPrice = CryptoPrice::find($id);

        if (!$cryptoPrice) {
            return response()->json(['message' => 'Cryptocurrency not found'], 404);
        }

        $wallets = $cryptoPrice->wallets;
        return response()->json($wallets, 200);
    }
}
