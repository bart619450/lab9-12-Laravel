<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentarz extends Model
{
    use HasFactory;

    protected $table = 'komentarz';

    protected $fillable = [
        'tresc', // treść komentarza
        'film_id',
        'user_id', // Powiązanie z użytkownikiem
    ];

    /**
     * Relacja z filmem (N:1)
     */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /**
     * Relacja z użytkownikiem (N:1)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Metoda, aby pobrać nazwę twórcy komentarza.
     */
    public function getTworca()
    {
        return $this->uzytkownik ? $this->uzytkownik->name : 'Nieznany użytkownik';
    }
}
