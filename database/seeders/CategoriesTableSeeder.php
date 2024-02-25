<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str; 

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $data = [
            [
                'cate_name'=> 'IPhone', 
                'cate_slug'=> Str::slug('IPhone')
            ], 
            [
                'cate_name'=> 'Samsung', 
                'cate_slug'=> Str::slug('Samsung')
            ]
            ]; 
        DB::table('vp_categories')->insert($data); 
    }
}
