<?php

namespace Database\Factories;

use App\Models\Categorias;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categorias_id' => Categorias::factory(),
            'titulo' => $this->faker->unique()->word,
            'contenido' => $this->faker->paragraph,
        ];
    }
}
