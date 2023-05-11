<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            "name" => "Feca",
            "slug" => "feca",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Osamodas",
            "slug" => "osamodas",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Enutrof",
            "slug" => "enutrof",
            "created_at" => now()

        ]);
        DB::table('classes')->insert([
            "name" => "Sram",
            "slug" => "sram",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Xélor",
            "slug" => "xelor",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Ecaflip",
            "slug" => "ecaflip",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Eniripsa",
            "slug" => "eniripsa",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Iop",
            "slug" => "iop",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Cra",
            "slug" => "cra",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Sadida",
            "slug" => "sadida",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Sacrieur",
            "slug" => "sacrieur",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Pandawa",
            "slug" => "pandawa",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Roubard",
            "slug" => "roublard",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Zobal",
            "slug" => "zobal",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Steamer",
            "slug" => "steamer",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Eliotrope",
            "slug" => "eliotrope",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Huppermage",
            "slug" => "huppermage",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Ouginak",
            "slug" => "ouginak",
            "created_at" => now()
        ]);
        DB::table('classes')->insert([
            "name" => "Forgelance",
            "slug" => "forgelance",
            "created_at" => now()
        ]);
    }
}
