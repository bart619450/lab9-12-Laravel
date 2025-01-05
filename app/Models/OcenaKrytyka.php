<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OcenaKrytyka extends Model
{
    use HasFactory;

    protected $table = 'ocena_krytyk';

    protected $fillable = [
        'ocena', // ocena krytyka, np. od 1 do 10
        'film_id',
        'user_id', // Powiązanie z krytykiem
    ];

    /**
     * Relacja z filmem (N:1)
     */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /**
     * Relacja z krytykiem (N:1)
     */
    public function krytyk()
    {
        return $this->belongsTo(User::class, 'krytyk_id');
    }
}
