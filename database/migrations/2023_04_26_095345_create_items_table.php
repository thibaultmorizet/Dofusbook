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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("summary");
            $table->foreignId('type_id')->constrained('types')->references('id')->onDelete('cascade');
            $table->integer("level");
            $table->integer("pods");
            $table->boolean("is_weapon");
            $table->string("image");
            $table->integer("critical_hit_probability")->nullable();
            $table->integer("critical_hit_bonus")->nullable();
            $table->boolean("is_two_handed")->nullable();
            $table->integer("max_cast_per_turn")->nullable();
            $table->integer("ap_cost")->nullable();
            $table->integer("range_min")->nullable();
            $table->integer("range_max")->nullable();
            $table->string("md5");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
