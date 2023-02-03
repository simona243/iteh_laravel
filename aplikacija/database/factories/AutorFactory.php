<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ime' => $this->faker->firstName(),
            'prezime' => $this->faker->lastName(),
            'datumRodj' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'mestoRodj' => $this->faker->city(),
      
        ];
    }
}
