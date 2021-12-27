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
        DB::table('tags')->insert([
            'tag_title' => 'Desserts',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Appetize',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Juice',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Main Dishes',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Pourtry'
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Seafood',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Specialties',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Snacks',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Sweet Things',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Chickens',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Diet',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Salty Food',
        ]);
    }
}
