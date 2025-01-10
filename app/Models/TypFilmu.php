<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypFilmu extends Model
{
    use HasFactory;

    protected $table = 'typyfilmow';

    protected $fillable = [
        'nazwa'
    ];

    /**
     * Relacja z filmami (M:N)
     */
    public function filmy()
    {
        return $this->belongsToMany(Film::class, 'film_typ');
    }

    /**
     * Relacja z użytkownikiem, który dodał typ filmu (jeśli dostępny)
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Zwrócenie imienia i nazwiska twórcy typu filmu (kto dodał)
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
