<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\CryptoPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{

    public function index()
    {
        $portfolios = Portfolio::where('user_id', Auth::id())->with('crypto')->get();
        return response()->json($portfolios, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'crypto_id' => 'required|exists:crypto_prices,id',
            'quantity' => 'required|numeric|min:0',
            'purchase_price' => 'required|numeric|min:0',
        ]);

        $crypto = CryptoPrice::find($request->crypto_id);
        $currentValue = $crypto->current_price * $request->quantity;//how much current value of crypto currency

        $portfolio = Portfolio::create([
            'user_id' => Auth::id(),
            'crypto_id' => $request->crypto_id,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'current_value' => $currentValue,
        ]);

        return response()->json($portfolio, 201);
    }

    public function show($id)
    {
        $portfolio = Portfolio::where('user_id', Auth::id())->with('crypto')->find($id);

        if (!$portfolio) {
            return response()->json(['message' => 'Portfolio not found'], 404);
        }

        return response()->json($portfolio, 200);
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::where('user_id', Auth::id())->find($id);

        if (!$portfolio) {
            return response()->json(['message' => 'Portfolio not found'], 404);
        }

        $request->validate([
            'quantity' => 'sometimes|numeric|min:0',
            'purchase_price' => 'sometimes|numeric|min:0',
        ]);

        $crypto = CryptoPrice::find($portfolio->crypto_id);
        $currentValue = $crypto->current_price * ($request->quantity ?? $portfolio->quantity);

        $portfolio->update([
            'quantity' => $request->quantity ?? $portfolio->quantity,
            'purchase_price' => $request->purchase_price ?? $portfolio->purchase_price,
            'current_value' => $currentValue,
        ]);

        return response()->json($portfolio, 200);
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::where('user_id', Auth::id())->find($id);

        if (!$portfolio) {
            return response()->json(['message' => 'Portfolio not found'], 404);
        }

        $portfolio->delete();

        return response()->json(['message' => 'Portfolio deleted successfully'], 200);
    }
}
