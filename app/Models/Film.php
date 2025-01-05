<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'filmy';

    protected $fillable = [
        'tytul',
        'data_premiery',
        'opis',
        'autor_id',
        'user_id' // Dodanie kolumny 'created_by' w celu przechowywania twórcy rekordu
    ];

    /**
     * Relacja z typami filmów (M:N)
     */
    public function typyfilmow()
    {
        return $this->belongsToMany(TypFilmu::class, 'film_typ');
    }

    /**
     * Relacja z aktorami (M:N)
     */
    public function aktorzy()
    {
        return $this->belongsToMany(Aktor::class, 'film_aktor');
    }

    /**
     * Relacja z autorem filmu (1:N)
     */
    public function autorzy()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    /**
     * Relacja z komentarzami (1:N)
     */
    public function komentarze()
    {
        return $this->hasMany(Komentarz::class);
    }

    /**
     * Relacja z ocenami krytyków (1:N)
     */
    public function ocenyKrytykow()
    {
        return $this->hasMany(OcenaKrytyka::class);
    }

    /**
     * Relacja z ocenami użytkowników (1:N)
     */
    public function ocenyUzytkownikow()
    {
        return $this->hasMany(OcenaUzytkownika::class);
    }

    /**
     * Metoda do obliczania średniej oceny krytyków.
     */
    public function sredniaOcenaKrytykow()
    {
        return $this->ocenyKrytykow()->avg('ocena');
    }

    /**
     * Metoda do obliczania średniej oceny użytkowników.
     */
    public function sredniaOcenaUzytkownikow()
    {
        return $this->ocenyUzytkownikow()->avg('ocena');
    }

    /**
     * Zwrócenie nazwy autora, jeśli dostępna
     */
    public function getAutorName()
    {
        return $this->autorzy ? $this->autorzy->imie . ' ' . $this->autorzy->nazwisko : 'Nieznany autor';
    }

    /**
     * Zwrócenie imienia i nazwiska twórcy filmu (kto dodał film)
     */
    public function getTworca()
{
    return $this->user ? $this->user->name : 'Admin'; // Sprawdzamy, kto jest twórcą
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}


    /**
     * Relacja z użytkownikiem, który dodał film (jeśli jest dostępny)
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
