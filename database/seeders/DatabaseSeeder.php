<?php

namespace Database\Seeders;

use App\Models\Insurances\Company;
use App\Models\Patients\Patient;
use App\Models\Users\User;
use Database\Factories\Common\PersonaFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

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

        if (App::environment('testing')) {
            $randPatTot = 50;
        } else {
            $randPatTot = random_int(250, 2500);
        }
        $this->command->info("Creating $randPatTot patients.");
        $this->command->info("Creating " . ($randPatTot * 3) . " contacts.");
        $this->command->info("Creating " . ($randPatTot * 2) . " insurance subscriptions.");
        Patient::factory($randPatTot)->createPatientDemographics()->create();

        // Temp user
        $this->command->info("Creating user.");
        $user = User::factory([
            'email'         => 'juanm.cortez@gmail.com',
            'password'      => bcrypt('123456789'),
        ])->create();
        PersonaFactory::new()
            ->count(1)
            ->createAddressPhone(2)
            ->create([
                'owner_id'      => $user->id,
                'owner_type'    => 'user',
                'first_name'    => 'Juan',
                'middle_name'   => 'Manuel',
                'last_name'     => 'Cortéz',
                'language'      => 'es',
                'title'         => 'mr',
                'date_of_birth' => date('m-d-Y', strtotime('04-08-1980'))
            ]);
    }
}
