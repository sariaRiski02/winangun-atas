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
        Schema::create('structure_profiles', function (Blueprint $table) {
            $table->id();
            $table->longText('history')->nullable(); // Sejarah Desa lengkap
            $table->string('structure_photo')->nullable(); // Struktur Pemerintahan
            $table->string('bpd_photo')->nullable(); // Struktur BPD
            $table->string('pkk_photo')->nullable(); // Struktur PKK
            $table->string('karangtaruna_photo')->nullable(); // Struktur Karang Taruna
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_profiles');
    }
};
