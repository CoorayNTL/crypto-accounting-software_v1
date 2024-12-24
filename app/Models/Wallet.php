<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Wallet extends Model
{
    protected $fillable = [
        'user_id',
        'crypto_id',
        'balance',
        'wallet_address',
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


// In practice, the number of wallets per user can range from one to several, depending on individual choices and needs. For instance,
//  a user might use separate wallets for different cryptocurrencies,
//employ hardware wallets for long-term storage, and software wallets for daily transactions.


// Explanation:
// The Wallet model stores information about a user’s crypto wallet, including the wallet address and the current balance of a particular crypto.
// The user() method defines a many-to-one relationship between wallets and users.
// The crypto() method defines a many-to-one relationship between wallets and the CryptoPrice model.
