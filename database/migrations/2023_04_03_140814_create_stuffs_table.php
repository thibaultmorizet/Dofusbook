<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->references('id')->onDelete('cascade');
            $table->foreignId('class_id')->constrained('classes')->references('id')->onDelete('cascade');
            $table->boolean('is_private')->default(true);
            $table->integer("character_level")->default(1);
            $table->string("gender")->default("male");
            $table->string("title")->default("");

            $table->boolean('is_exo_pa')->default(false);
            $table->boolean('is_exo_pm')->default(false);
            $table->boolean('is_exo_po')->default(false);

            $table->integer("vitality_boost")->default(0);
            $table->integer("intel_boost")->default(0);
            $table->integer("agility_boost")->default(0);
            $table->integer("strength_boost")->default(0);
            $table->integer("luck_boost")->default(0);
            $table->integer("wisdom_boost")->default(0);
            $table->integer("boost_available")->default(0);

            $table->integer("vitality_parchment")->default(0);
            $table->integer("intel_parchment")->default(0);
            $table->integer("agility_parchment")->default(0);
            $table->integer("strength_parchment")->default(0);
            $table->integer("luck_parchment")->default(0);
            $table->integer("wisdom_parchment")->default(0);

            $table->integer("amulet_id")->nullable();
            $table->integer("shield_id")->nullable();
            $table->integer("ring_1_id")->nullable();
            $table->integer("belt_id")->nullable();
            $table->integer("boots_id")->nullable();

            $table->integer("hat_id")->nullable();
            $table->integer("weapon_id")->nullable();
            $table->integer("ring_2_id")->nullable();
            $table->integer("cape_id")->nullable();
            $table->integer("animal_id")->nullable();

            $table->integer("dofus_1_id")->nullable();
            $table->integer("dofus_2_id")->nullable();
            $table->integer("dofus_3_id")->nullable();
            $table->integer("dofus_4_id")->nullable();
            $table->integer("dofus_5_id")->nullable();
            $table->integer("dofus_6_id")->nullable();

            $table->integer("total_vitality")->default(55);
            $table->integer("total_prospection")->default(100);
            $table->integer("total_pa")->default(6);
            $table->integer("total_pm")->default(3);
            $table->integer("total_po")->default(0);
            $table->integer("total_initiative")->default(0);

            $table->integer("subtotal_vitality")->default(0);
            $table->integer("subtotal_intel")->default(0);
            $table->integer("subtotal_agility")->default(0);
            $table->integer("subtotal_strength")->default(0);
            $table->integer("subtotal_luck")->default(0);
            $table->integer("subtotal_wisdom")->default(0);

            $table->integer("leak")->default(0);
            $table->integer("avoid_pa")->default(0);
            $table->integer("avoid_pm")->default(0);
            $table->integer("pods")->default(1000);

            $table->integer("tackle")->default(0);
            $table->integer("pa_recession")->default(0);
            $table->integer("pm_recession")->default(0);
            $table->integer("stuff_level")->default(0);

            $table->integer("stuff_vitality")->default(0);
            $table->integer("stuff_strength")->default(0);
            $table->integer("stuff_intel")->default(0);
            $table->integer("stuff_luck")->default(0);
            $table->integer("stuff_agility")->default(0);
            $table->integer("stuff_wisdom")->default(0);
            $table->integer("stuff_initiative")->default(0);
            $table->integer("stuff_leak")->default(0);
            $table->integer("stuff_avoid_pm")->default(0);
            $table->integer("stuff_avoid_pa")->default(0);
            $table->integer("stuff_pa_recession")->default(0);
            $table->integer("stuff_pm_recession")->default(0);
            $table->integer("stuff_pods")->default(0);
            $table->integer("stuff_prospection")->default(0);
            $table->integer("stuff_tackle")->default(0);
            $table->integer("stuff_invocation")->default(1);
            $table->integer("stuff_health")->default(0);
            $table->integer("stuff_power")->default(0);
            $table->integer("stuff_critic")->default(0);
            $table->integer("stuff_pa")->default(0);
            $table->integer("stuff_pm")->default(0);
            $table->integer("stuff_po")->default(0);
            $table->integer("stuff_neutral_res")->default(0);
            $table->integer("stuff_water_res")->default(0);
            $table->integer("stuff_earth_res")->default(0);
            $table->integer("stuff_fire_res")->default(0);
            $table->integer("stuff_air_res")->default(0);
            $table->integer("stuff_percent_neutral_res")->default(0);
            $table->integer("stuff_percent_water_res")->default(0);
            $table->integer("stuff_percent_earth_res")->default(0);
            $table->integer("stuff_percent_fire_res")->default(0);
            $table->integer("stuff_percent_air_res")->default(0);
            $table->integer("stuff_distance_res")->default(0);
            $table->integer("stuff_critique_res")->default(0);
            $table->integer("stuff_push_res")->default(0);
            $table->integer("stuff_melee_res")->default(0);
            $table->integer("stuff_weapon_res")->default(0);
            $table->integer("stuff_do_neutral")->default(0);
            $table->integer("stuff_do_earth")->default(0);
            $table->integer("stuff_do_fire")->default(0);
            $table->integer("stuff_do_air")->default(0);
            $table->integer("stuff_do_water")->default(0);
            $table->integer("stuff_do_critique")->default(0);
            $table->integer("stuff_do_push")->default(0);
            $table->integer("stuff_do_melee")->default(0);
            $table->integer("stuff_do_distance")->default(0);
            $table->integer("stuff_do_weapon")->default(0);
            $table->integer("stuff_do_spell")->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuffs');
    }
};
