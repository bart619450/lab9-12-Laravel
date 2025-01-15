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
        $maxRetries = 1;
        $retries = 0;
        $uniqueValue = '';

        // Pętla próbująca generować unikalne słowo
        while ($retries < $maxRetries) {
            try {
                // Próbujemy wygenerować unikalne słowo
                $uniqueValue = $this->faker->unique()->word;
                break; // Jeśli udało się wygenerować unikalne słowo, przerywamy pętlę
            } catch (\OverflowException $e) {
                $retries++;
                if ($retries >= $maxRetries) {
                    // Jeśli przekroczono limit prób, przełączamy na generowanie zdania
                    $uniqueValue = $this->faker->sentence;
                    break; // Przerywamy pętlę, ponieważ udało się wygenerować zdanie
                }
            }
        }

        return [
            'nazwa' => $uniqueValue, // Dodajemy losową liczbę do nazwy
        ];
    }
}
