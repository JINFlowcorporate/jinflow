<?php

namespace Database\Factories;

use App\Models\Biens;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'https://www.igc-construction.fr/sites/default/files/2020-11/maison-design-avec-terrasse-en-bois.jpg',
            'https://www.depreux-construction.com/wp-content/uploads/2018/11/depreux-construction.jpg',
            'https://www.maisonsbatifrance.fr/images/maison/15-wonder-modele-maisons-bati-france.jpg',
            'https://www.maisonsclairlogis.fr/wp-content/uploads/maison-contemporaine_onyx-version-nuit.jpg'
        ];

        $key = array_rand($images);

        return [
            'biens_id' => 1,
            'image' => $images[$key]
        ];
    }
}
