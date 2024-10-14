<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Donation::class;
    public function definition()
    {

        return [
            'title' => "Aqui vai o titulo ",
            'body' => "Aqui vai o corpo  ",

        ];
    }
}
