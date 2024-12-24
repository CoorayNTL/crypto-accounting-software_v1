<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoPrice extends Model
{
    protected $fillable = [
        'symbol',
        'name',
        'current_price',
        'market_cap',
        '24h_change',
        'last_updated',
    ];

    /**
     * Get all transactions for a specific crypto.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get all portfolios that include this crypto.
     */
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * Get all wallets that hold this crypto.
     */
    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
}


// Explanation:
// The CryptoPrice model tracks the latest details for each cryptocurrency, such as its symbol (e.g., BTC, ETH), name, current price, market cap, 24-hour price change,
// and the time it was last updated.
// The transactions(), portfolios(), and wallets() methods define one-to-many relationships between CryptoPrice and other models (Transactions, Portfolios, and Wallets).