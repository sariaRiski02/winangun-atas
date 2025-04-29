<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('kades_photo')->nullable(); // Path foto kades
            $table->text('greeting')->nullable(); // Kata sambutan
            $table->string('hero_photo')->nullable(); // Path foto hero landing
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_profiles');
    }
};
