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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CASHIER_ID');
            $table->unsignedBigInteger('PRODUCT_ID');
            $table->integer('QTY');
            $table->bigInteger('PRICE');
            $table->timestamps();

            // Relationship User
            $table->foreign('CASHIER_ID')->references('id')->on('users');

            // Relationship Product
            $table->foreign('PRODUCT_ID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
