<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'quang1609',
            'email' => 'quangbn1609@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 1,
            'created_at' => date("Y/m/d")
        ]);
        for ($i = 0; $i <= 99;$i++) {
            DB::table('users')->insert([
                'name' => 'quang' . Str::random(10),
                'email' => 'quang' . Str::random(10) . '@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 2,
                'created_at' => date("Y/m/d")
            ]);
        }
    }
}
