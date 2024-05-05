<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicacion>
 */
class PublicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(5),
            'texto' => fake()->paragraph(5),
            'tipo' => $this->tipo()
        ];
    }

    private $tipos = [0 => 'recomendacion', 1 => 'resena', 2 => 'entrevista', 3 => 'evento'];
    private function tipo(): string{
        return $this->tipos[rand(0,3)];
    }
}
