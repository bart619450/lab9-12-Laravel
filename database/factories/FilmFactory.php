<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Aktor;
use App\Models\Autor;
use App\Models\TypFilmu;
use App\Models\OcenaKrytyka;
use App\Models\OcenaUzytkownika;
use App\Models\Komentarz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition()
    {
        // Losowe dane dla filmu
        return [
            'tytul' => $this->faker->sentence,
            'data_premiery' => $this->faker->date(),
            'opis' => $this->faker->text,
            'autor_id' => Autor::inRandomOrder()->first()->id,  // Losowy autor
        ];
    }

    public function configure()
{
    return $this->afterCreating(function (Film $film) {
        // Przypisanie losowych aktorów
        $actorIds = Aktor::inRandomOrder()->take(rand(1, 3))->pluck('id');
        $film->aktorzy()->attach($actorIds);

        // Przypisanie losowych typów filmów
        $typeIds = TypFilmu::inRandomOrder()->take(rand(1, 2))->pluck('id');
        $film->typyfilmow()->attach($typeIds);

        // Dodanie ocen krytyka i użytkownika
        $userId = \App\Models\User::inRandomOrder()->first()->id;  // Losowy użytkownik, ale już istniejący
        OcenaKrytyka::create([
            'film_id' => $film->id,
            'ocena' => $this->faker->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $userId,
        ]);

        OcenaUzytkownika::create([
            'film_id' => $film->id,
            'ocena' => $this->faker->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $userId,
        ]);

        // Dodanie losowych komentarzy
        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film->id,
                
            ]);
        }
        /*
        Komentarz::factory(rand(5, 10))->create([
            'film_id' => $film->id,
        ]);
        */

    });
}
}
