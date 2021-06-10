<?php

namespace Tests\Feature;

use App\Models\Insurances\Company;
use App\Models\Patients\Patient;
use App\Models\Users\User;
use Database\Seeders\ListsItemsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePatient extends TestCase
{
    use RefreshDatabase;

    /**
     * Check if we can access Patient list page
     *
     * @return void
     */
    public function test_get_patients_list()
    {
        $user = User::factory()->createUserDemographics()->create();

        $response = $this->actingAs($user)->get('/patients/list');

        $response->assertStatus(200);
    }


    public function test_mew_patient_screen_can_be_rendered()
    {
        $user = User::factory()->createUserDemographics()->create();

        $response = $this->actingAs($user)->get('/patients/new');

        $response->assertStatus(200);
    }


    public function test_create_mew_patient()
    {
        $this->withoutExceptionHandling();

        $this->seed(ListsItemsSeeder::class);

        $insurances = Company::factory(25)->createAddressPhone()->create();

        $user = User::factory()->createUserDemographics()->create();

        $response = $this->actingAs($user)->get('/patients/new');

        $patient = Patient::factory()->createPatientDemographics()->create();

        $response = $this->actingAs($user)->get("/patients/$patient->patID/ledger");

        $response->assertStatus(200);
    }


    public function test_edit_mew_patient()
    {
        $this->seed(ListsItemsSeeder::class);

        $insurances = Company::factory(25)->createAddressPhone()->create();

        $user = User::factory()->createUserDemographics()->create();

        $response = $this->actingAs($user)->get('/patients/new');

        $patient = Patient::factory()->createPatientDemographics()->create();

        $response = $this->actingAs($user)->get("/patients/$patient->patID/edit/demographics");

        $response = $this->actingAs($user)->put("/patients/$patient->patID/edit/demographics", $patient->toArray());

        $response->assertStatus(302);
    }
}
