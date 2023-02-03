<?php

namespace Database\Factories;

use App\Models\Autor;
use App\Models\Zanr;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnjigaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
 
    public function definition()
    {
        return [
            'naziv' => $this->faker->word(),
            'godIzdanja' => $this->faker->numberBetween($min = 1900, $max = 2022),
            'zanr' => $this->faker-> numberBetween($min = 1, $max = Zanr::count()), 
            'autor' => $this->faker-> numberBetween($min = 1, $max = Autor::count()), 
      
        ];
    }
}
