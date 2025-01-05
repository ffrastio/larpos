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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TRANSACTION_ID');
            $table->unsignedBigInteger('PRODUCT_ID');
            $table->integer('QTY');
            $table->bigInteger('PRICE');
            $table->timestamps();

            // Relationship Transaction
            $table->foreign('TRANSACTION_ID')->references('id')->on('transactions');

            // Relationship Transaction
            $table->foreign('PRODUCT_ID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
