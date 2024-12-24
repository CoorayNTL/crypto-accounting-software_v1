<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'crypto_id',
        'amount',
        'transaction_type',
        'price_at_time',
        'status',
        'transaction_date',
    ];

    /**
     * The user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The crypto asset associated with the transaction.
     */
    public function crypto()
    {
        return $this->belongsTo(CryptoPrice::class, 'crypto_id');
    }
}



// <!-- Explanation:
// The Transaction model represents a crypto transaction with fields such as user_id, crypto_id, amount,
// transaction_type (buy/sell/transfer), price_at_time (the price of crypto at the time of the transaction), status, and transaction_date.
// The user() method establishes a many-to-one relationship between transactions and users.
// The crypto() method establishes a many-to-one relationship between transactions and the crypto asset involved in the transaction. -->
