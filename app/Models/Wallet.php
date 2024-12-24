<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Wallet extends Model
{
    protected $fillable = [
        'user_id',
        'crypto_id',
        'quantity',
        'purchase_price',
        'current_value',
    ];

    /**
     * The user that owns the wallet.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The crypto asset associated with the wallet.
     */
    public function crypto()
    {
        return $this->belongsTo(CryptoPrice::class, 'crypto_id');
    }
}



// Explanation:
// The Wallet model stores information about a user’s crypto wallet, including the wallet address and the current balance of a particular crypto.
// The user() method defines a many-to-one relationship between wallets and users.
// The crypto() method defines a many-to-one relationship between wallets and the CryptoPrice model.
