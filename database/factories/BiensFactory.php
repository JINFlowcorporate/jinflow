<?php

namespace Database\Factories;

use App\Models\Biens;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BiensFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Biens::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Appart',
            'slug' => Str::slug('appart' . rand(0, 99999)),
            'fr' => [
                'description' => 'Descrp fr'
            ],
            'en' => [
                'description' => 'Descrp en'
            ],
            'nb_beds' => 4,
            'type' => 'Appartement',
            'nb_bathroom' => 1,
            'zipcode' => 93100,
            'state' => 'Seine-Saint-Denis',
            'city' => 'Montreuil',
            'square_feet' => '63',
            'rent_start_date' => '2021-08-28',
            'price' => 120000,
            'total_tokens' => 1000,
            'tokens_price' => 50,
            'expected_yield' => 10,
            'gross_rent_year' => 20,
            'gross_rent_month' => 11,
            'property_management' => 15,
            'jinflow_tax' => 2,
            'property_tax' => 10,
            'insurance' => 6,
            'net_rent_year' => 9,
            'net_rent_month' => 11,
            'yield_token' => 11,
        ];
    }
}
