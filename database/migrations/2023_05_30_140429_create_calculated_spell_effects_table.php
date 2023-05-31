<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calculated_spell_effects', function (Blueprint $table) {
            $table->id();
            $table->integer("level");
            $table->string("effect");
            $table->boolean("cc");
            $table->integer("min");
            $table->integer("max");
            $table->integer("min_melee");
            $table->integer("max_melee");
            $table->integer("min_distance");
            $table->integer("max_distance");
            $table->integer("duration");
            $table->foreignId('stuff_id')->constrained('stuffs')->references('id')->onDelete('cascade');
            $table->foreignId('spell_effect_id')->constrained('spell_effects')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculated_spell_effects');
    }
};
