<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Band;
use Illuminate\Support\Facades\Artisan;
use App\Album;

class BandBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_that_bands_are_visible_on_index_page()
    {
        $bands = factory(Band::class, 10)->create()->fresh();

        $this->browse(function (Browser $browser) use ($bands) {
            $browser->visit('/');

            foreach ($bands as $band) {
                $browser->assertSee($band->name)
                    ->assertSee($band->getFormattedStartDate())
                    ->assertSee($band->website)
                    ->assertSee($band->getFormattedActiveStatus());
            }
        });
    }

    public function test_that_bands_can_be_deleted_from_index_page()
    {
        $band = factory(Band::class)->create();
        $album = factory(Album::class)->create(['band_id' => $band->id]);

        $this->assertDatabaseHas('bands', [
            'id' => $band->id
        ])->assertDatabaseHas('albums', [
            'id' => $album->id,
            'band_id' => $band->id
        ]);


        $this->browse(function (Browser $browser) use ($band) {
            $browser->visit(route('band.index'))
                ->with("@{$band->name}", function ($bandListing) {
                    $bandListing->clickLink('Delete');
                });
        });

        $this->assertDatabaseMissing('bands', [
            'id' => $band->id
        ])->assertDatabaseMissing('albums', [
            'id' => $album->id,
            'band_id' => $band->id
        ]);
    }

    public function test_that_deleting_a_band_removes_their_albums_from_album_index()
    {
        $band = factory(Band::class)->create();
        $album = factory(Album::class)->create(['band_id' => $band->id]);

        $this->browse(function (Browser $browser) use ($band, $album) {
            $browser->visit(route('band.index'))
                ->assertSee($band->name)
                ->with("@{$band->name}", function ($bandListing) {
                    $bandListing->clickLink('Edit');
                })
                ->assertSee($album->name)
                ->visit(route('album.index'))
                ->assertSee($album->name)
                ->visit(route('band.index'))
                ->with("@{$band->name}", function ($bandListing) {
                    $bandListing->clickLink('Delete');
                })
                ->assertDontSee($band->name)
                ->visit(route('album.index'))
                ->assertDontSee($album->name);
        });
    }
}
