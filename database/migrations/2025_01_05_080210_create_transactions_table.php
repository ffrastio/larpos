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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CASHIER_ID');
            $table->unsignedBigInteger('CUSTOMER_ID');
            $table->string('INVOICE');
            $table->bigInteger('CASH');
            $table->bigInteger('CHANGE');
            $table->bigInteger('DISCOUNT');
            $table->bigInteger('GRAND_TOTAL');
            $table->softDeletes();
            $table->timestamps();

            // Relationship Cashier/User
            $table->foreign('CASHIER_ID')->references('id')->on('users');
            
            // Relationship Customer
            $table->foreign('CUSTOMER_ID')->references('id')->on('customers');
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
