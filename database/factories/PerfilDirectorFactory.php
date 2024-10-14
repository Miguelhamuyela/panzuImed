<?php

namespace Database\Factories;

use App\Models\PerfilDirector;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PerfilDirectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerfilDirector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Ferreira Manuel Fragoso",
            'description' => "Aqui vai um breve historial sobre o director Ferreira Manuel Fragoso",
            'image' => ""

        ];
    }
}
