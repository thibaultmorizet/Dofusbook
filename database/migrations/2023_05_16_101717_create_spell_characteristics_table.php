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
        Schema::create('spell_characteristics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spell_id')->constrained('spells')->references('id')->onDelete('cascade');
            $table->boolean("is_level1")->default(false);
            $table->boolean("is_level2")->default(false);
            $table->boolean("is_level3")->default(false);
            $table->integer("pa")->nullable();
            $table->string("po")->nullable();
            $table->integer("ir")->nullable();
            $table->integer("cc")->nullable();
            $table->integer("cc_rate")->nullable();
            $table->integer("lt")->nullable();
            $table->integer("ltj")->nullable();
            $table->integer("cu")->nullable();
            $table->boolean("zo")->default(false);
            $table->string("zo_zo")->nullable();
            $table->string("zo_po")->nullable();
            $table->string("pb")->nullable();
            $table->string("lel")->nullable();
            $table->string("ldv")->nullable();
            $table->string("led")->nullable();
            $table->string("irg")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spell_characteristics');
    }
};
