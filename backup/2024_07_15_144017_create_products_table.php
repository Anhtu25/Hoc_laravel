<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * php artisan migrate.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->string('name',200);
            $table->timestamps(); //create_at | update_at
            $table->string('description', 500)->nullable();
            $table->float('price',10,2)->default(800,02);//trước dấu phẩy sẽ chứa 8 ký tự và sau dấu phẩy chứa 2 ký tự 12345678.44
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * php artisan migration:rollback | reset.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
