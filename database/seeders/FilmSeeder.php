<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aktor;
use App\Models\Autor;
use App\Models\Film;
use App\Models\TypFilmu;
use App\Models\User;
use App\Models\Komentarz;
use App\Models\OcenaKrytyka;
use App\Models\OcenaUzytkownika;
use Database\Factories\KomentarzFactory;


class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('qwerty123'),
            'role' => 'admin',
        ]);
        $krytyk1 = User::create([
            'name' => 'Krytyk',
            'email' => 'krytyk@example.com',
            'password' => bcrypt('qwerty123'),
            'role' => 'krytyk',
        ]);
        $krytyk2 = User::create([
            'name' => 'Arek',
            'email' => 'krytyk2@example.com',
            'password' => bcrypt('qwerty123'),
            'role' => 'krytyk',
        ]);
        // Tworzenie aktorów
        $aktor1 = Aktor::create([
            'imie' => 'Ryan',
            'nazwisko' => 'Reynolds'
        ]);

        $aktor2 = Aktor::create([
            'imie' => 'Chris',
            'nazwisko' => 'Evans'
        ]);

        $aktor3 = Aktor::create([
            'imie' => 'Leonardo',
            'nazwisko' => 'DiCaprio'
        ]);

        $aktor4 = Aktor::create([
            'imie' => 'Joseph',
            'nazwisko' => 'Gordon-Levitt'
        ]);

        $aktor5 = Aktor::create([
            'imie' => 'Margot',
            'nazwisko' => 'Robbie'
        ]);

        // Tworzenie autorów
        $autor1 = Autor::create([
            'imie' => 'James',
            'nazwisko' => 'Gunn'
        ]);

        $autor2 = Autor::create([
            'imie' => 'Christopher',
            'nazwisko' => 'Nolan'
        ]);

        $autor3 = Autor::create([
            'imie' => 'Quentin',
            'nazwisko' => 'Tarantino'
        ]);

        $autor4 = Autor::create([
            'imie' => 'David',
            'nazwisko' => 'Fincher'
        ]);

        // Tworzenie typów filmów
        $typHorror = TypFilmu::create(['nazwa' => 'Horror']);
        $typKomedia = TypFilmu::create(['nazwa' => 'Komedia']);
        $typDrama = TypFilmu::create(['nazwa' => 'Drama']);
        $typAkcja = TypFilmu::create(['nazwa' => 'Akcja']);
        $typSciFi = TypFilmu::create(['nazwa' => 'Science Fiction']);

        // Tworzenie filmów
        $film1 = Film::create([
            'tytul' => 'Deadpool',
            'data_premiery' => '2016-02-12',
            'opis' => 'Ekranizacja jednego z najoryginalniejszych komiksów Marvel Comics.',
            'autor_id' => $autor1->id
        ]);
        $film1->typyfilmow()->attach([$typHorror->id, $typKomedia->id]);
        $film1->aktorzy()->attach([$aktor1->id, $aktor2->id]);

        $users = User::factory(100)->create();
        
        OcenaKrytyka::create([
            'film_id' => $film1->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film1->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        for($i=0;$i<3;$i++){
        KomentarzFactory::new()->create([
            'film_id' => $film1->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ]);
        }
        
        
       


        $film2 = Film::create([
            'tytul' => 'Inception',
            'data_premiery' => '2010-07-16',
            'opis' => 'Film science fiction o podróżach wewnątrz snów.',
            'autor_id' => $autor2->id
        ]);
        $film2->typyfilmow()->attach([$typSciFi->id]);
        $film2->aktorzy()->attach([$aktor3->id, $aktor4->id]);

        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film2->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }
        OcenaKrytyka::create([
            'film_id' => $film2->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film2->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        

        

        $film3 = Film::create([
            'tytul' => 'Pulp Fiction',
            'data_premiery' => '1994-10-14',
            'opis' => 'Film, który zrewolucjonizował współczesne kino.',
            'autor_id' => $autor3->id
        ]);
        $film3->typyfilmow()->attach([$typKomedia->id, $typDrama->id]);
        $film3->aktorzy()->attach([$aktor1->id, $aktor2->id]);

        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film3->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }
        OcenaKrytyka::create([
            'film_id' => $film3->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film3->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        

        $film4 = Film::create([
            'tytul' => 'Fight Club',
            'data_premiery' => '1999-10-15',
            'opis' => 'Film o mężczyźnie, który zakłada klub walki.',
            'autor_id' => $autor4->id
        ]);
        $film4->typyfilmow()->attach([$typAkcja->id, $typDrama->id]);
        $film4->aktorzy()->attach([$aktor3->id]);

        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film4->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }
        OcenaKrytyka::create([
            'film_id' => $film4->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film4->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        

        $film5 = Film::create([
            'tytul' => 'The Wolf of Wall Street',
            'data_premiery' => '2013-12-25',
            'opis' => 'Historia jednego z najbardziej kontrowersyjnych inwestorów na Wall Street.',
            'autor_id' => $autor2->id
        ]);
        $film5->typyfilmow()->attach([$typDrama->id]);
        $film5->aktorzy()->attach([$aktor3->id]);

        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film5->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }
        OcenaKrytyka::create([
            'film_id' => $film5->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film5->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        

        $film6 = Film::create([
            'tytul' => 'The Revenant',
            'data_premiery' => '2015-12-25',
            'opis' => 'Film o przetrwaniu w dzikiej przyrodzie.',
            'autor_id' => $autor2->id
        ]);
        $film6->typyfilmow()->attach([$typDrama->id, $typAkcja->id]);
        $film6->aktorzy()->attach([$aktor3->id]);
        OcenaKrytyka::create([
            'film_id' => $film6->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film6->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);

        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film6->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }
        

        $film7 = Film::create([
            'tytul' => 'Suicide Squad',
            'data_premiery' => '2016-08-05',
            'opis' => 'Grupa przestępców wykonuje misję dla rządu.',
            'autor_id' => $autor1->id
        ]);
        $film7->typyfilmow()->attach([$typAkcja->id, $typKomedia->id]);
        $film7->aktorzy()->attach([$aktor1->id, $aktor2->id]);

        OcenaKrytyka::create([
            'film_id' => $film7->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film7->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film7->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }

        $film8 = Film::create([
            'tytul' => 'Once Upon a Time in Hollywood',
            'data_premiery' => '2019-07-26',
            'opis' => 'Opowieść o przemianach w Hollywood lat 60-tych.',
            'autor_id' => $autor3->id
        ]);
        $film8->typyfilmow()->attach([$typDrama->id]);
        $film8->aktorzy()->attach([$aktor1->id, $aktor5->id]);

        OcenaKrytyka::create([
            'film_id' => $film8->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film8->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film8->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }

        $film9 = Film::create([
            'tytul' => 'The Dark Knight',
            'data_premiery' => '2008-07-18',
            'opis' => 'Film o Batmanie walczącym z Jokerem.',
            'autor_id' => $autor2->id
        ]);
        $film9->typyfilmow()->attach([$typAkcja->id, $typDrama->id]);
        $film9->aktorzy()->attach([$aktor3->id]);
        OcenaKrytyka::create([
            'film_id' => $film9->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film9->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film9->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }

        $film10 = Film::create([
            'tytul' => 'Gladiator',
            'data_premiery' => '2000-05-05',
            'opis' => 'Film o rzymskim gladiatorze, który walczy o honor i zemstę.',
            'autor_id' => $autor4->id
        ]);
        $film10->typyfilmow()->attach([$typAkcja->id, $typDrama->id]);
        $film10->aktorzy()->attach([$aktor3->id]);

        OcenaKrytyka::create([
            'film_id' => $film10->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena krytyka
            'user_id' => $users->random()->id,
        ]);
        
        // Dodaj ocenę użytkownika
        
        OcenaUzytkownika::create([
            'film_id' => $film10->id,
            'ocena' => fake()->randomFloat(2, 1, 10), // Losowa ocena użytkownika
            'user_id' => $users->random()->id,
        ]);
        for($i=0;$i<3;$i++){
            KomentarzFactory::new()->create([
                'film_id' => $film10->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
            }
        

        

        Aktor::factory(1000)->create(); // Dodaje 1000 aktorów

        // Tworzenie autorów
        Autor::factory(1000)->create(); // Dodaje 1000 autorów

        // Tworzenie typów filmów
        TypFilmu::factory(1000)->create(); // Dodaje 1000 typów filmów

        

        // Tworzenie filmów
        Film::factory(1000)->create(); // Dodaje 1000 filmów

        

    }
}
