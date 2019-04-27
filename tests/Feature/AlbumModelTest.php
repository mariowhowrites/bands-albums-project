<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class AlbumModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_albums_have_all_required_attributes()
    {
        $album = factory(Album::class)->create()->fresh();

        $this->assertDatabaseHas('albums', [
            'band_id' => $album->band->id,
            'name' => $album->name,
            'recorded_date' => $album->recorded_date,
            'release_date' => $album->release_date,
            'number_of_tracks' => $album->number_of_tracks,
            'label' => $album->label,
            'producer' => $album->producer,
            'genre' => $album->genre
        ]);
    }

    public function test_that_albums_belong_to_bands()
    {
        $band = factory(Band::class)->create();
        $album = factory(Album::class)->create(['band_id' => $band->id]);

        $this->assertEquals($band->id, $album->band->id);
    }
}
