<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 500; $i++) {
            DB::table('items')->insert([
                'name' => 'Gun ' . Str::random(4),
                'quantity' => rand(30, 100),
                'user_id' => rand(1, 101),
                'category_id' => rand(1, 7),
                'created_at' => date("Y/m/d")
            ]);
        }
    }
}
