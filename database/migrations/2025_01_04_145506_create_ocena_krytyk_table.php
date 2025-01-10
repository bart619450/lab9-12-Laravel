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
        Schema::create('ocena_krytyk', function (Blueprint $table) {
            $table->id();
            $table->integer('ocena')->unsigned()->checkBetween(1, 10); // Ocena od 1 do 10
            $table->foreignId('film_id')->constrained('filmy')->onDelete('cascade'); // Klucz obcy do tabeli filmy
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Klucz obcy do tabeli users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocena_krytyk');
    }
};
