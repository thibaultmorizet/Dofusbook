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
        Schema::create('spell_effects', function (Blueprint $table) {
            $table->id();
            $table->integer("level");
            $table->string("effect");
            $table->boolean("cc");
            $table->integer("min");
            $table->integer("max");
            $table->integer("duration");
            $table->foreignId('dommage_group_id')->constrained('dommage_groups')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spell_effects');
    }
};
