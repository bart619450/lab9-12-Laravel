<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Autor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class AutorFactory extends Factory
{
    protected $model = Autor::class;
    public function definition(): array
    {
        
        return [
            'imie' => $this->faker->firstName,
            'nazwisko' => $this->faker->lastName,
        ];
    }
}
