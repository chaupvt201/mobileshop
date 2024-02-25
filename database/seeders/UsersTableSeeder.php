<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use DB; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $data = [
            [
                'email' =>'vietpro@gmail.com', 
                'password' =>bcrypt('123456'), 
                'level' =>1
            ], 
            [
                'email' =>'admin@gmail.com', 
                'password' =>bcrypt('123456'), 
                'level' =>1
            ]
            ]; 
        DB::table('users')->insert($data); 
    }
}
