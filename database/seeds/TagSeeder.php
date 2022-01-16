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
            'tag_title' => 'デザート',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '前菜',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'ジュース',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'メインディッシュ',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '家禽'
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'シーフード',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '特産品',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'おやつ',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '甘いもの',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '鶏',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'ダイエット',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '塩辛い食べ物',
        ]);
    }
}
