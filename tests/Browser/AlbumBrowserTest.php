<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Album;

class AlbumBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_that_albums_are_visible_on_index_page()
    {
        $albums = factory(Album::class, 10)->create()->fresh();

        $this->browse(function (Browser $browser) use ($albums) {
            $browser->visit(route('album.index'));

            foreach ($albums as $album) {
                $browser->assertSee($album->name)
                    ->assertSee($album->band->name)
                    ->assertSee($album->getFormattedReleaseDate())
                    ->assertSee($album->getFormattedRecordedDate())
                    ->assertSee($album->number_of_tracks)
                    ->assertSee($album->genre)
                    ->assertSee($album->label)
                    ->assertSee($album->producer);
            }
        });
    }
}
