<?php

namespace Database\Factories;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name(),
            'resumo' => $this->faker->text(),
            'genero' => $this->faker->word(),
            'lancamento' => date('Y-m-d'),
            'episodios' => $this->faker->randomDigit(),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ];
    }
}
