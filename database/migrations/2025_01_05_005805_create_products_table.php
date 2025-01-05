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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CATEGORY_ID');
            $table->string('IMAGE');
            $table->string('BARCODE')->unique();
            $table->string('NAME');
            $table->text('DESCRIPTION');
            $table->bigInteger('PREVIOUS_PRICE');
            $table->bigInteger('BUY_PRICE');
            $table->bigInteger('SELL_PRICE');
            $table->integer('STOCK');
            $table->timestamps();
            $table->softDeletes();

            // Relationship Categories
            $table->foreign('CATEGORY_ID')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
