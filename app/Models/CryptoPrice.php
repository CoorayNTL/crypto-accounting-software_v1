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

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
}

//Here want to remember Currency symbol can create only one time can not create duplicate currency symbol
// Explanation:
// The CryptoPrice model tracks the latest details for each cryptocurrency, such as its symbol (e.g., BTC, ETH), name,
//current price, market cap, 24-hour price change,
// and the time it was last updated.
// The transactions(), portfolios(), and wallets() methods define one-to-many relationships between C
//ryptoPrice and other models (Transactions, Portfolios, and Wallets).
