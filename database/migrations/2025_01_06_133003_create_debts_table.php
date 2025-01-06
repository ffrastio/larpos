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
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CUSTOMER_ID');
            $table->text('DESCRIPTION');
            $table->bigIncrements('DEBT');
            $table->bigIncrements('CASH');
            $table->bigIncrements('TOTAL');
            $table->timestamps();

            // Relationship Customer
            $table->foreign('CUSTOMER_ID')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
