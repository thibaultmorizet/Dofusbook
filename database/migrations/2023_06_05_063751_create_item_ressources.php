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
        Schema::create('item_ressources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items')->references('id')->onDelete('cascade');
            $table->foreignId('ressource_id')->nullable()->constrained('ressources')->references('id')->onDelete('cascade');
            $table->foreignId('item_ressource_id')->nullable()->constrained('items')->references('id')->onDelete('cascade');
            $table->integer("quantity");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_ressources');
    }
};
