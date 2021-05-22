<?php

namespace Tests\Feature;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        //$response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasNoErrors();
    }

    /**
     * Check if we can access Patient list page
     *
     * @return void
     */
    public function test_get_patients_list()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/patients/list');

        $response->assertStatus(200);
    }
}
