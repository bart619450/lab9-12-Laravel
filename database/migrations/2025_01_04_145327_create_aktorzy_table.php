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
        Schema::create('aktorzy', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('nazwisko');
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->onDelete('set null'); // Dodano user_id
            $table->timestamps();
        });
        Schema::create('film_aktor', function (Blueprint $table) {
            $table->foreignId('film_id')->constrained('filmy')->onDelete('cascade');
            $table->foreignId('aktor_id')->constrained('aktorzy')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktorzy');
        Schema::dropIfExists('film_aktor');
    }
};
