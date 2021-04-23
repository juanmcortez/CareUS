<?php

namespace Database\Factories\Common;

use App\Models\Common\Persona;
use Database\Factories\Common\AddressFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $driver = $this->faker->randomLetter . $this->faker->randomLetter . $this->faker->randomLetter;

        return [
            'owner_type'        => $this->faker->randomElement(['patient', 'persona', 'contact', 'employment', 'subscriber']),
            'owner_id'          => Persona::factory(),
            'title'             => $this->faker->title($gender),
            'first_name'        => $this->faker->firstName($gender),
            'middle_name'       => $this->faker->firstName($gender),
            'last_name'         => $this->faker->lastName,
            'email'             => $this->faker->email,
            'date_of_birth'     => $this->faker->dateTimeBetween('-80 years', '-1 years'),
            'gender'            => $gender,
            'social_security'   => random_int(001, 899) . '-' . random_int(10, 99) . '-' . random_int(0001, 9999),
            'driver_license'    => strtoupper($driver . random_int(10000000, 99999999)),
        ];
    }


    /**
     * After creating the persona, create
     * all of the other relationship models
     */
    public function createAddressPhone()
    {
        return $this->afterCreating(
            function (Persona $persona) {
                AddressFactory::new()->create(['owner_id' => $persona->id, 'owner_type' => 'persona']);
            }
        );
    }
}
