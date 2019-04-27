<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Album;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use App\Band;

$factory->define(Album::class, function (Faker $faker) {
    $bands = Band::all();

    $band = $bands->isNotEmpty() ? $bands->random() : factory(Band::class)->create();

    $recorded_date = $faker->dateTimeBetween($band->start_date);

    return [
        'band_id' => $band->id,
        'name' => $faker->bs,
        'recorded_date' => $recorded_date,
        'release_date' => $faker->dateTimeBetween($recorded_date),
        'number_of_tracks' => $faker->numberBetween(4, 30),
        'label' => $faker->company,
        'producer' => $faker->name,
        'genre' => Arr::random(['Rap', 'Hip-Hop', 'R&B', 'Electronic', 'Pop', 'Classical', 'Jazz'])
    ];
});
