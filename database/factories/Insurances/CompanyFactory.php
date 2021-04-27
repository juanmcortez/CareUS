<?php

namespace Database\Factories\Insurances;

use App\Models\Insurances\Company;
use Database\Factories\Common\AddressFactory;
use Database\Factories\Common\PhoneFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name'      => $this->faker->company,
            'payerID'           => random_int(111111111, 999999999999),
        ];
    }


    /**
     * After creating the persona, create
     * all of the other relationship models
     */
    public function createAddressPhone()
    {
        return $this->afterCreating(
            function (Company $company) {
                // Only 1 address
                AddressFactory::new()->create(['owner_id' => $company->insID, 'owner_type' => 'insurance']);
                // Upto $countPhones phones
                PhoneFactory::new()->create(['owner_id' => $company->insID, 'owner_type' => 'insurance']);
            }
        );
    }
}
