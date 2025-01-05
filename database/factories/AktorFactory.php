<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Aktor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class AktorFactory extends Factory
{
    protected $model = Aktor::class;
    public function definition(): array
    {
        
        return [
            'imie' => $this->faker->firstName,
            'nazwisko' => $this->faker->lastName,
        ];
    }
}
