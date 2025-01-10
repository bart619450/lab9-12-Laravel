<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TypFilmu;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class TypFilmuFactory extends Factory
{
    
      protected $model = TypFilmu::class;
     
    public function definition(): array
    {
        
        return [
            'nazwa' => $this->faker->word,
            //
        ];
    }
}
