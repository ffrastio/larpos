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
            $table->unsignedBigInteger('category_id');
            $table->string('image');
            $table->string('barcode')->unique();
            $table->string('name');
            $table->text('description');
            $table->bigInteger('previous_price');
            $table->bigInteger('buy_price');
            $table->bigInteger('sell_price');
            $table->integer('stock');
            $table->timestamps();
            $table->softDeletes();

            // Relationship Categories
            $table->foreign('category_id')->references('id')->on('categories');
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
