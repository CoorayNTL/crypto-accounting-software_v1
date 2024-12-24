<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CryptoPricesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('crypto_prices')->insert([
            [
                'symbol' => 'BTC',
                'name' => 'Bitcoin',
                'current_price' => 48000.12345678,
                'market_cap' => 900000000000.00,
                '24h_change' => 2.45,
                'last_updated' => now(),
            ],
            [
                'symbol' => 'ETH',
                'name' => 'Ethereum',
                'current_price' => 3500.65432100,
                'market_cap' => 400000000000.00,
                '24h_change' => -1.23,
                'last_updated' => now(),
            ],
            [
                'symbol' => 'BNB',
                'name' => 'Binance Coin',
                'current_price' => 410.12345600,
                'market_cap' => 68000000000.00,
                '24h_change' => 3.67,
                'last_updated' => now(),
            ],
        ]);
    }
}
