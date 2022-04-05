<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('users')->insert([
            [
           'name' => 'テスト1',
           'email' => 'test1@test.jp',
           'password' => Hash::make('testtest')
            ],
            [
           'name' => 'テスト2',
           'email' => 'test2@test.jp',
           'password' => Hash::make('testtest')
            ],
            [
           'name' => 'テスト3',
           'email' => 'test3@test.jp',
           'password' => Hash::make('testtest')
            ],
        ]);
     
     $this->call(UserTableSeeder::class);  
   }
   
}

