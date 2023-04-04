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
            $table->integer("level")->default(1);
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

            $table->integer("helmet_id")->nullable();
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
