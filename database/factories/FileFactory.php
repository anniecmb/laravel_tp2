<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
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
            'nom' => $this->faker->name(),
            'path_file' => $this->faker->file('uploads'),
            'user_id' => User::factory(),
            'file_name' => $this->faker->name(),
        ];
    }
}
