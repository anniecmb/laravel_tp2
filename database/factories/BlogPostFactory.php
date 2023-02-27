<?php

namespace Database\Factories;
use App\Models\BlogPost;
use App\Models\User;
use Psy\Readline\Hoa\ProtocolException;

// protected $model = BlogPost::class;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'titre' => $this->faker->sentence,
            'body' => $this->faker->paragraph(30),
            'texte' => $this->faker->paragraph(30),
            'user_id' => User::factory()
        ];
    }
}
