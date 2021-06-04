<?php

namespace Database\Factories\Insurances;

use App\Models\Insurances\Subscriber;
use App\Models\Patients\Patient;
use Database\Factories\Common\PersonaFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomInit = '-' . random_int(1, 36) . ' months';
        return [
            'owner_type'            => $this->faker->randomElement(['patient', 'persona', 'contact', 'employment', 'subscriber', 'insurance']),
            'owner_id'              => Patient::factory(),
            'level'                 => $this->faker->randomElement(['primary', 'secondary', 'tertiary']),
            'company_id'            => random_int(1, 25), // we are creating 25 insurance companies
            'policy_number'         => random_int(10000, 9999999),
            'accept_assignment'     => $this->faker->randomElement([false, true]),
            'effective_date'        => $this->faker->dateTimeBetween($randomInit, 'now'),
            'ins_relation'          => $this->faker->randomElement(['child', 'other', 'self', 'spouse']),
        ];
    }


    /**
     * After creating the subscriber, create
     * all of the other relationship models
     */
    public function createSubscriberPersona()
    {
        return $this->afterCreating(
            function (Subscriber $subscriber) {
                PersonaFactory::new()
                    ->count(1)
                    ->createAddressPhone(1)
                    ->create([
                        'owner_id'      => $subscriber->subID,
                        'owner_type'    => 'subscriber',
                    ]);
            }
        );
    }
}
