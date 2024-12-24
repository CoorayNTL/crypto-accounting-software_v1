<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'user_id',
        'crypto_id',
        'quantity',
        'purchase_price',
        'current_value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crypto()
    {
        return $this->belongsTo(CryptoPrice::class, 'crypto_id');
    }
}


// Explanation:
// The Portfolio model keeps track of the user's holdings, including the quantity of each cryptocurrency, the purchase price, and its current value.
// The user() method establishes a many-to-one relationship with the User model.
// The crypto() method defines a many-to-one relationship between portfolios and CryptoPrice (the cryptocurrency asset).
