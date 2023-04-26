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
        Schema::create('sets_effects', function (Blueprint $table) {
            $table->foreignId('set_id')->constrained('sets')->references('id')->onDelete('cascade');
            $table->foreignId('effect_id')->constrained('effects')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets_effects');
    }
};
