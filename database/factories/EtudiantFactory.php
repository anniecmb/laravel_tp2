<?php

namespace Database\Factories;
use App\Models\Ville;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'adresse' => $this->faker->streetAddress(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'naissance' => $this->faker->date(),
            'ville_id' => $this->faker->numberBetween(1, 15)
        ];
    }
}
