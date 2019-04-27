<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(40, function () {
            factory(Album::class)->create(['band_id' => rand(1, 10)]);
        });
    }
}
