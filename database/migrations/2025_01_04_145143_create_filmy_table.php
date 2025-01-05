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
        Schema::create('filmy', function (Blueprint $table) {
            $table->id();
            $table->string('tytul');
            $table->date('data_premiery')->nullable();
            $table->text('opis')->nullable();
            $table->foreignId('autor_id')->nullable()
                ->constrained('autorzy')->onDelete('set null');
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmy');
    }
};
