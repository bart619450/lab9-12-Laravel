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
        Schema::create('typyfilmow', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->onDelete('set null'); // Dodano user_id
            $table->timestamps();
        });
        Schema::create('film_typ', function (Blueprint $table) {
            $table->foreignId('film_id')->constrained('filmy')->onDelete('cascade');
            $table->foreignId('typ_filmu_id')->constrained('typyfilmow')->onDelete('cascade'); // Zmieniona nazwa kolumny
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typyfilmow');
        Schema::dropIfExists('film_typ');
    }
};
