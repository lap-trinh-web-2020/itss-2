<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => "韓国風焼きおにぎり",
            'content' => "
            *まずごま油大さじ1、醤油大さじ1、みりん大さじ1、コチュジャン小さじ1、鰹だし2つまみを混ぜます。
            *そしてお茶碗一杯分調味料のところに入れて混ぜます。
            *そしてお茶碗一杯分調味料のところに入れて混ぜます
            *混ぜたら、おにぎりの形にします
            *魚焼きグリルで10分くらい、焼き目がつくまで焼きます
            *エゴマの葉を下にひき、焼きおにぎりをのせます
            *塩を添えて出来上がりです
             ",
            'description' => "エゴマの葉を焼きおにぎりに巻いて食べると美味しかったので",
            'date_create' => date('Y-m-d H:i:s'),
            'post_url' => 'https://i.ibb.co/JQgkr2r/f0512f960ec8c307aa795e7d13fee35a-jpeg.jpg',
        ]);
    }
}
