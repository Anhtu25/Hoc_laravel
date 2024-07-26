<?php

namespace Database\Seeders;


use App\Models\ProductComment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductComment::factory()->count(10)->create();
    }
}
