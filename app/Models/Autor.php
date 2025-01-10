<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autorzy';

    protected $fillable = [
        'imie',
        'nazwisko'
    ];

    /**
     * Relacja z filmami (1:N)
     */
    public function filmy()
    {
        return $this->hasMany(Film::class);
    }

    /**
     * Relacja z użytkownikiem, który dodał autora (jeśli dostępny)
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Zwrócenie imienia i nazwiska twórcy autora (kto dodał)
     */
    public function getTworca()
    {
        return $this->user ? $this->user->name : 'Admin'; // Sprawdzamy, kto jest twórcą
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
