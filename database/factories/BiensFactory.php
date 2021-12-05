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
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.563211119453!2d2.418139515674002!3d48.84746967928645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67284fb7a85fb%3A0xa234f21ec4a169c6!2s19%20Rue%20de%20la%20Pr%C3%A9voyance%2C%2094300%20Vincennes!5e0!3m2!1sfr!2sfr!4v1634640339068!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'slug' => Str::slug('appart' . rand(0, 99999)),
            'fr' => [
                'about' => 'Welcome to Margaritaville (Resort)! If you are not familiar with the famous U.S. songwriter Jimmy Buffett, who wrote the iconic song: “Margaritaville,” this resort captures the lyrics with the its laid back vibe, warm water, and instant relaxation.
The Margaritaville Resort is an oasis on the outskirts of the Disney parks. It is an 8 minute ride to the parks or guests can take the Resort’s complimentary shuttle service. Certified as a “Walt Disney World Good Neighbor Hotel,” it is a highly sought after area by millenials for vacation as well as being a destination itself.
This unit is attractive, tastefully furnished and was built less than a year ago. The resort is 70% complete. We anticipate the value to increase when fully complete!
For more info, check out our post on Medium!',
                'description' => 'Welcome to Margaritaville (Resort)! If you are not familiar with the famous U.S. songwriter Jimmy Buffett, who wrote the iconic song: “Margaritaville,” this resort captures the lyrics with the its laid back vibe, warm water, and instant relaxation.
The Margaritaville Resort is an oasis on the outskirts of the Disney parks. It is an 8 minute ride to the parks or guests can take the Resort’s complimentary shuttle service. Certified as a “Walt Disney World Good Neighbor Hotel,” it is a highly sought after area by millenials for vacation as well as being a destination itself.
This unit is attractive, tastefully furnished and was built less than a year ago. The resort is 70% complete. We anticipate the value to increase when fully complete!
For more info, check out our post on Medium!'
            ],
            'en' => [
                'about' => 'Welcome to Margaritaville (Resort)! If you are not familiar with the famous U.S. songwriter Jimmy Buffett, who wrote the iconic song: “Margaritaville,” this resort captures the lyrics with the its laid back vibe, warm water, and instant relaxation.
The Margaritaville Resort is an oasis on the outskirts of the Disney parks. It is an 8 minute ride to the parks or guests can take the Resort’s complimentary shuttle service. Certified as a “Walt Disney World Good Neighbor Hotel,” it is a highly sought after area by millenials for vacation as well as being a destination itself.
This unit is attractive, tastefully furnished and was built less than a year ago. The resort is 70% complete. We anticipate the value to increase when fully complete!
For more info, check out our post on Medium!',
                'description' => 'Welcome to Margaritaville (Resort)! If you are not familiar with the famous U.S. songwriter Jimmy Buffett, who wrote the iconic song: “Margaritaville,” this resort captures the lyrics with the its laid back vibe, warm water, and instant relaxation.
The Margaritaville Resort is an oasis on the outskirts of the Disney parks. It is an 8 minute ride to the parks or guests can take the Resort’s complimentary shuttle service. Certified as a “Walt Disney World Good Neighbor Hotel,” it is a highly sought after area by millenials for vacation as well as being a destination itself.
This unit is attractive, tastefully furnished and was built less than a year ago. The resort is 70% complete. We anticipate the value to increase when fully complete!
For more info, check out our post on Medium!'
            ],
            'nb_beds' => 4,
            'type_id' => 1,
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
