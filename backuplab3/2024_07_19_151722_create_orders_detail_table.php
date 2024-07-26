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
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->unsignedInteger('orderId');
            $table->timestamps();
            $table->unsignedInteger('productId');
            $table->integer('quantity')->default(1);
            $table->foreign('orderId')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('productId')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_detail');
    }
};
