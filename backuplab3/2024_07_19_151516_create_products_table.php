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
            $table->increments('product_id');
            $table->string('name',200);
            $table->timestamps(); //create_at | update_at
            $table->string('description', 500)->nullable();
            $table->float('price',10,2)->default(800,02);//trước dấu phẩy sẽ chứa 8 ký tự và sau dấu phẩy chứa 2 ký tự 12345678.44
            
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
