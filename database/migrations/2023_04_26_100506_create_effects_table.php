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
        Schema::create('effects', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("image");
            $table->string("translate_name");
            $table->integer("int_minimum");
            $table->integer("int_maximum");
            $table->boolean("ignore_int_min")->default(false);
            $table->boolean("ignore_int_max")->default(false);
            $table->string("formatted_name");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('effects');
    }
};
