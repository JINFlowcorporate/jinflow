<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_photo_path' => 'https://media-exp1.licdn.com/dms/image/C4D03AQHGQri04cs6Pg/profile-displayphoto-shrink_800_800/0/1612973638589?e=1638403200&v=beta&t=Fp41c63CHk9JNEoTLGHqhhMcgxeOsBvRK0Bbvvdf-VA',
            'lastname' => 'Hamrouni',
            'firstname' => 'Charfeddine',
            'phone' => '0764750704',
            'is_admin' => 1,
            'username' => 'Kirito',
            'birthdate' => '1996-12-5',
            'us_citizen' => 0,
            'referrer_code' => 7829016352,
            'referred_by' => 7829016352,
            'address' => '6 rue adrienne maire',
            'city' => 'Montreuil',
            'billing_country' => 'France',
            'state' => 'Seine-Saint-Denis',
            'zipcode' => 93100,
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => '3728193627',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
