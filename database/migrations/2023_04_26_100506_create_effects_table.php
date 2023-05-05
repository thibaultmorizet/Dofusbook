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
            $table->string("translated_name");
            $table->integer("int_minimum");
            $table->integer("int_maximum");
            $table->boolean("ignore_int_min")->default(false);
            $table->boolean("ignore_int_max")->default(false);
            $table->string("formatted_name", 1000);
            $table->foreignId('item_id')->nullable()->constrained('items')->references('id')->onDelete('cascade');
            $table->foreignId('set_id')->nullable()->constrained('sets')->references('id')->onDelete('cascade');
            $table->integer("set_number_items")->nullable();
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
