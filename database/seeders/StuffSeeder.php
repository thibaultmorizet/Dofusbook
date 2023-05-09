<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StuffSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stuffs')->insert([
            "user_id" => 1,
            "class_id" => 4,
            "is_private" => 1,
            "character_level" => 200,
            "gender" => "female",
            "title" => "stuff air",
            "is_exo_pa" => 1,
            "is_exo_pm" => 0,
            "is_exo_po" => 0,
            "vitality_boost" => 3,
            "intel_boost" => 0,
            "strength_boost" => 0,
            "luck_boost" => 0,
            "wisdom_boost" => 0,
            "agility_boost" => 398,
            "vitality_parchment" => 100,
            "intel_parchment" => 100,
            "strength_parchment" => 100,
            "luck_parchment" => 100,
            "wisdom_parchment" => 100,
            "agility_parchment" => 100,
            "amulet_id" => 17581,
            "shield_id" => 18700,
            "ring_1_id" => 13124,
            "belt_id" => 19599,
            "boots_id" => 13125,
            "hat_id" => 13123,
            "weapon_id" => 18014,
            "ring_2_id" => 17582,
            "cape_id" => 17583,
            "animal_id" => 177,
            "dofus_1_id" => 7043,
            "dofus_2_id" => 8698,
            "dofus_3_id" => 694,
            "dofus_4_id" => 12714,
            "dofus_5_id" => 13830,
            "dofus_6_id" => 13828,
        ]);

    }
}