<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 1,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 2,
            'post_id' => 1,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 2,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 3,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 4,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 5,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 6,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 7,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 8,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 9,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 1,
            'post_id' => 10,
            'quantity' => 2.6
        ]);
        DB::table('product_of_post')->insert([
            'product_id' => 3,
            'post_id' => 10,
            'quantity' => 2.6
        ]);
    }
}
