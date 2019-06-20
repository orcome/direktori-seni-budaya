<?php

use App\User;
use Faker\Generator as Faker;
use App\TraditionalMusicInstrument;

$factory->define(TraditionalMusicInstrument::class, function (Faker $faker) {

    return [
        'name'             => $faker->word,
        'sum_sub_district' => 20,
        'description'      => $faker->sentence,
        'creator_id'       => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
