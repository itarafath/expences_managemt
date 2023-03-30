<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('transaction_id');
            $table->integer('token');
            $table->enum('transaction_type', ['D', 'C']);
            $table->boolean('transaction_status');
            $table->bigInteger('merchant_code');
            $table->string('merchant_name', 50);
            $table->string('merchant_country', 3);
            $table->string('currency', 3);
            $table->decimal('amount', 10, 2);
            $table->string('transaction_currency', 3);
            $table->decimal('transaction_amount', 10, 2);
            $table->integer('auth_code');
            $table->dateTime('transaction_date');
            $table->boolean('is_synced')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
