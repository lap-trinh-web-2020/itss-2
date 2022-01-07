<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'ごま油',
            'product_price' => 0.1,
            'date_create' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'product_name' => '醤油',
            'product_price' => 0.5,
            'date_create' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'product_name' => 'みりん',
            'product_price' => 3,
            'date_create' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'product_name' => '鰹だし',
            'product_price' => 5,
            'date_create' => date('Y-m-d H:i:s'),
        ]);
    }
}
