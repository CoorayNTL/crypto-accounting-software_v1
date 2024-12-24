<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('crypto_id')->constrained('crypto_prices')->onDelete('cascade');
                $table->decimal('amount', 16, 8);
                $table->enum('transaction_type', ['buy', 'sell', 'transfer']);
                $table->decimal('price_at_time', 16, 8);
                $table->enum('status', ['pending', 'completed', 'failed']);
                $table->timestamp('transaction_date')->useCurrent();
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
