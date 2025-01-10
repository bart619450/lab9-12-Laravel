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
        Schema::create('komentarz', function (Blueprint $table) {
            $table->id();
            $table->text('tresc'); // Treść komentarza
            $table->foreignId('film_id')->constrained('filmy')->onDelete('cascade'); // Klucz obcy do tabeli filmy
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Klucz obcy do tabeli users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentarz');
    }
};
