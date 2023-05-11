<?php

namespace App\Http\Livewire\Stuff;

use App\Models\Stuffs;

class CreateVariable
{
    public ?int $stuff_id = null;

    public string $character_gender = "male";
    public bool $is_private_stuff = true;

    public int $is_exo_pa = 0;
    public int $is_exo_pm = 0;
    public int $is_exo_po = 0;


    public int $total_vitality = 55;
    public int $total_prospection = 100;
    public int $total_pa = 6;
    public int $total_pm = 3;
    public int $total_po = 0;
    public int $total_initiative = 0;

    public int $subtotal_vitality = 0;
    public int $subtotal_wisdom = 0;
    public int $subtotal_strength = 0;
    public int $subtotal_intel = 0;
    public int $subtotal_luck = 0;
    public int $subtotal_agility = 0;


    public int $leak = 0;
    public int $avoid_pa = 0;
    public int $avoid_pm = 0;
    public int $pods = 1000;

    public int $tackle = 0;
    public int $pa_recession = 0;
    public int $pm_recession = 0;
    public int $stuff_level = 0;

    public Stuffs $stuff;
    public string $class_slug = "feca";
    public int $class_id = 1;


    public array $stuffDetail = [
        'amulet' => null,
        'shield' => null,
        'ring_1' => null,
        'ring_2' => null,
        'belt' => null,
        'boots' => null,
        'hat' => null,
        'cape' => null,
        'dofus_1' => null,
        'dofus_2' => null,
        'dofus_3' => null,
        'dofus_4' => null,
        'dofus_5' => null,
        'dofus_6' => null,
        'animal' => null,
        'weapon' => null
    ];

    public int $stuff_vitality = 0;
    public int $stuff_strength = 0;
    public int $stuff_intel = 0;
    public int $stuff_luck = 0;
    public int $stuff_agility = 0;
    public int $stuff_wisdom = 0;
    public int $stuff_initiative = 0;
    public int $stuff_leak = 0;
    public int $stuff_avoid_pm = 0;
    public int $stuff_avoid_pa = 0;
    public int $stuff_pa_recession = 0;
    public int $stuff_pm_recession = 0;
    public int $stuff_pods = 0;
    public int $stuff_prospection = 0;
    public int $stuff_tackle = 0;
    public int $stuff_invocation = 1;
    public int $stuff_health = 0;
    public int $stuff_power = 0;
    public int $stuff_critic = 0;
    public int $stuff_pa = 0;
    public int $stuff_pm = 0;
    public int $stuff_po = 0;
    public int $stuff_neutral_res = 0;
    public int $stuff_water_res = 0;
    public int $stuff_earth_res = 0;
    public int $stuff_fire_res = 0;
    public int $stuff_air_res = 0;
    public int $stuff_percent_neutral_res = 0;
    public int $stuff_percent_water_res = 0;
    public int $stuff_percent_earth_res = 0;
    public int $stuff_percent_fire_res = 0;
    public int $stuff_percent_air_res = 0;
    public int $stuff_distance_res = 0;
    public int $stuff_critique_res = 0;
    public int $stuff_push_res = 0;
    public int $stuff_melee_res = 0;
    public int $stuff_weapon_res = 0;
    public int $stuff_do_neutral = 0;
    public int $stuff_do_earth = 0;
    public int $stuff_do_fire = 0;
    public int $stuff_do_air = 0;
    public int $stuff_do_water = 0;
    public int $stuff_do_critique = 0;
    public int $stuff_do_push = 0;
    public int $stuff_do_melee = 0;
    public int $stuff_do_distance = 0;
    public int $stuff_do_weapon = 0;
    public int $stuff_do_spell = 0;
    public array $setLinks = [];

    public function __construct()
    {
    }


}