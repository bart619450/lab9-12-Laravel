<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aktor extends Model
{
    use HasFactory;

    protected $table = 'aktorzy';

    protected $fillable = [
        'imie',
        'nazwisko'
    ];

    /**
     * Relacja z filmami (M:N)
     */
    public function filmy()
    {
        return $this->belongsToMany(Film::class, 'film_aktor');
    }

    /**
     * Relacja z użytkownikiem, który dodał aktora (jeśli dostępny)
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Zwrócenie imienia i nazwiska twórcy aktora (kto dodał)
     */
    
    public function getTworca()
{
    return $this->user ? $this->user->name : 'Admin'; // Sprawdzamy, kto jest twórcą
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
