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
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId('ressource_type_id')->constrained('ressource_types')->references('id')->onDelete('cascade');
            $table->integer("level");
            $table->string("image");
            $table->string("summary", 5000)->nullable();
            $table->string("md5");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
