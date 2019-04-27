<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class BandModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_created_bands_have_all_required_attributes()
    {
        $band = factory(Band::class)->create()->fresh();

        $this->assertDatabaseHas('bands', [
            'name' => $band->name,
            'start_date' => $band->start_date,
            'website' => $band->website,
            'still_active' => $band->still_active
        ]);
    }
}
