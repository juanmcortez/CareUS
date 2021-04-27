<?php

namespace Database\Factories\Common;

use App\Models\Common\Address;
use App\Models\Common\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_type'        => $this->faker->randomElement(['patient', 'persona', 'contact', 'employment', 'subscriber', 'insurance']),
            'owner_id'          => Persona::factory(),
            'street'            => $this->faker->streetAddress,
            'street_extended'   => $this->faker->secondaryAddress,
            'city'              => $this->faker->city,
            'state'             => $this->faker->state,
            'zip'               => $this->faker->postcode,
            'country'           => $this->faker->countryCode,
        ];
    }
}
