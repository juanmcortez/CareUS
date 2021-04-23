<?php

namespace Database\Seeders;

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
        Patient::factory(10)->createPatientDemographics()->create();
    }
}
