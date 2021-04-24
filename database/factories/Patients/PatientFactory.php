<?php

namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use Database\Factories\Common\AddressFactory;
use Database\Factories\Common\PersonaFactory;
use Database\Factories\Insurances\SubscriberFactory;
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

    /**
     * After creating the patient, create
     * all of the other relationship models
     */
    public function createPatientDemographics()
    {
        return $this->afterCreating(
            function (Patient $patient) {
                PersonaFactory::new()
                    ->count(1)
                    ->createAddressPhone(2)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'patient',
                    ]);

                $contactType = $this->faker->randomElement(['mother', 'father', 'guardian', 'relative', 'other']);
                PersonaFactory::new()
                    ->count(3)
                    ->createAddressPhone(1)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'contact',
                        'contact_type'  => $contactType,
                    ]);

                $company = $this->faker->company;
                $occupation = $this->faker->jobTitle;
                PersonaFactory::new()
                    ->count(1)
                    ->createAddressPhone(1)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'employment',
                        'company'       => $company,
                        'occupation'    => $occupation,
                    ]);

                // Force a primary insurance
                SubscriberFactory::new()
                    ->count(1)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'patient',
                        'level'         => 'primary',
                    ]);

                // Random one
                SubscriberFactory::new()
                    ->count(1)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'patient',
                    ]);
            }
        );
    }
}
