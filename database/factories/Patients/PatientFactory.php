<?php

namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'externalID'                => random_int(100000, 999999999999),
            'patient_level_accession'   => $this->faker->randomElement(['', random_int(100000, 999999999999)]),
        ];
    }
}
