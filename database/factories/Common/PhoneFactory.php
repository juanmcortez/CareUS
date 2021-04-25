<?php

namespace Database\Factories\Common;

use App\Models\Common\Persona;
use App\Models\Common\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_type'            => $this->faker->randomElement(['patient', 'persona', 'contact', 'employment', 'subscriber', 'insurance']),
            'owner_id'              => Persona::factory(),
            'type'                  => $this->faker->randomElement(['home', 'cellphone', 'work', 'emergency', 'family', 'relative']),
            'international_code'    => '1',
            'area_code'             => random_int(100, 999),
            'initial_digits'        => random_int(100, 999),
            'last_digits'           => random_int(1000, 9999),
            'extension'             => random_int(1, 99),
        ];
    }
}
