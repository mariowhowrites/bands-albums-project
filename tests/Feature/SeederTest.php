<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Album;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_bands_and_albums_are_created_from_seeders()
    {
        $this->assertDatabaseMissing('bands', [
            'id' => 10
        ]);

        $this->assertDatabaseMissing('albums', [
            'id' => 40
        ]);

        Artisan::call('db:seed');

        $this->assertDatabaseHas('bands', [
            'id' => 10
        ]);

        $this->assertDatabaseHas('albums', [
            'id' => 40
        ]);
    }

    public function test_that_seeded_bands_and_albums_are_related()
    {
        Artisan::call('db:seed');

        $albums = Album::all();

        foreach ($albums as $album) {
            $this->assertDatabaseHas('bands', [
                'id' => $album->band->id
            ]);
        }
    }
}
