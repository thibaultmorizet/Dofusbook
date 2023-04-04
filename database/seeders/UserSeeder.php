<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "pseudo" => "thibault",
            "email" => "thibaultmorizet@icloud.com",
            "password" => bcrypt("8bJhDXgPNxcW2MJ"),
        ]);

        DB::table('users')->insert([
            "pseudo" => "thibault test",
            "email" => "thibaulttest@icloud.com",
            "password" => bcrypt("thibault"),
        ]);
    }
}
