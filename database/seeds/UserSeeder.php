<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'user_name' => 'anhldq',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'test1@gmail.com',
            'phone' => '0123456789',
            'address' => Str::random(20),
            'job' => Str::random(10),
            'des' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'user_name' => 'trunglha',
            'password' => Hash::make('123456'),
            'gender' => 'female',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'test2@gmail.com',
            'phone' => '0123456789',
            'address' => Str::random(20),
            'job' => Str::random(10),
            'des' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'user_name' => 'admin ',
            'password' => Hash::make('123456'),
            'gender' => 'female',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'address' => Str::random(20),
            'job' => Str::random(10),
            'admin' => 1,
            'des' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'first_name' => 'restauran',
            'last_name' => 'A',
            'user_name' => 'restauran',
            'password' => Hash::make('12345678'),
            'gender' => 'male',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'restauran@gmail.com',
            'phone' => '0123456789',
            'isrestauran' => 1,
            'address' => Str::random(20),
            'job' => Str::random(10),
            'des' => Str::random(10),
        ]);
    }
}
