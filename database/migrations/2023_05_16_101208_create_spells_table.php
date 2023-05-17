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
        Schema::create('spells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->nullable()->constrained('classes')->references('id')->onDelete('cascade');
            $table->string("name");
            $table->string("summary", 5000)->nullable();
            $table->string("image");

            $table->integer("level1")->nullable();
            $table->integer("level2")->nullable();
            $table->integer("level3")->nullable();

            $table->boolean("is_invoc")->nullable();
            $table->boolean("is_variante")->nullable();
            $table->boolean("sum_damages")->nullable();

            $table->string("md5");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spells');
    }
};
