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
        Schema::create('dommage_groups', function (Blueprint $table) {
            $table->id();
            $table->integer("order");
            $table->string("title")->nullable();
            $table->foreignId('spell_id')->constrained('spells')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dommage_groups');
    }
};
