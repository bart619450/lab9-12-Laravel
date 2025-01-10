<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OcenaUzytkownika extends Model
{
    use HasFactory;

    protected $table = 'ocena_uzytkownik';

    protected $fillable = [
        'ocena', // ocena użytkownika, np. od 1 do 10
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
    public function uzytkownik()
    {
        return $this->belongsTo(User::class, 'uzytkownik_id');
    }
}
