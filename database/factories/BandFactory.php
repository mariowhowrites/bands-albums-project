<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Band;
use Faker\Generator as Faker;

$factory->define(Band::class, function (Faker $faker) {
    return [
        'name' => $faker->domainWord . " " . $faker->domainWord . " " . $faker->domainWord,
        'start_date' => $faker->dateTimeThisCentury(),
        'website' => $faker->domainName,
        'still_active' => $faker->boolean()
    ];
});
