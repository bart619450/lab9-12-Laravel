<?php
// database/factories/KomentarzFactory.php

namespace Database\Factories;

use App\Models\Komentarz;
use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KomentarzFactory extends Factory
{
    protected $model = Komentarz::class;

    public function definition()
    {
        return [
            'film_id' => Film::inRandomOrder()->first()->id,  // Losowy film
            'user_id' =>  User::inRandomOrder()->first()->id,  // Losowy użytkownik
            'tresc' => $this->faker->sentence(),  // Losowa treść komentarza
        ];
    }
}
