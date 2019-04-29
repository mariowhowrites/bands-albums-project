<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class BandControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_name_is_required_when_creating_a_band()
    {
        $band = factory(Band::class)->make(['name' => null])->toArray();
        unset($band['routes']);
        $this->assertDatabaseMissing('bands', $band);

        $response = $this->post(
            route('band.store'),
            compact('band')
        );

        $response->assertStatus(302);
        $this->assertDatabaseMissing('bands', $band);
    }


    public function test_that_name_is_required_when_editing_a_band()
    {
        $band = factory(Band::class)->create()->fresh();
        $bandArray = $band->toArray();
        unset($bandArray['routes']);

        $this->assertDatabaseHas('bands', $bandArray);

        $bandArray['name'] = null;
        $response = $this->put(
            route('band.update', compact('band')),
            ['band' => $bandArray]
        );

        $response->assertStatus(302);
        $this->assertDatabaseMissing('bands', $bandArray);
    }
}
