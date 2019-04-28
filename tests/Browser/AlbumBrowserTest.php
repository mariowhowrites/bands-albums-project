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
                $browser->assertSee($album->name);
                $browser->assertSee($album->band->name);
                $browser->assertSee($album->getFormattedReleaseDate());
                $browser->assertSee($album->getFormattedRecordedDate());
                $browser->assertSee($album->number_of_tracks);
                $browser->assertSee($album->genre);
                $browser->assertSee($album->label);
                $browser->assertSee($album->producer);
            }
        });
    }
}
