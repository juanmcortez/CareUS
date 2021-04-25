<?php

namespace Database\Seeders;

use App\Models\Insurances\Company;
use App\Models\Patients\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(25)->createAddressPhone()->create();
        Patient::factory(100)->createPatientDemographics()->create();
    }
}
