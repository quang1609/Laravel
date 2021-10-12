<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Sung truong',
            'quantity' => rand(30, 100),
            'created_at' => date("Y/m/d")
        ]);
        DB::table('categories')->insert([
            'name' => 'Sung tia',
            'quantity' => rand(30, 100),
            'created_at' => date("Y/m/d")
        ]);
        DB::table('categories')->insert([
            'name' => 'Sung tieu lien',
            'quantity' => rand(30, 100),
            'created_at' => date("Y/m/d")
        ]);
        DB::table('categories')->insert([
            'name' => 'Sung shotgun',
            'quantity' => rand(30, 100),
            'created_at' => date("Y/m/d")
        ]);
        DB::table('categories')->insert([
            'name' => 'Sung guom',
            'quantity' => rand(30, 100),
            'created_at' => date("Y/m/d")
        ]);
        DB::table('categories')->insert([
            'name' => 'Sung luc',
            'quantity' => rand(30, 100),
            'created_at' => date("Y/m/d")
        ]);
        DB::table('categories')->insert([
            'name' => 'Sung auto',
            'quantity' => rand(30, 100),
            'created_at' => date("Y/m/d")
        ]);
    }
}
