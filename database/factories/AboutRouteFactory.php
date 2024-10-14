<?php

namespace Database\Factories;

use App\Models\AboutRoute;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutRouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = AboutRoute::class;
    public function definition()
    {

        return [
            'description' => "Sobre o Percurso"

        ];
    }
}
