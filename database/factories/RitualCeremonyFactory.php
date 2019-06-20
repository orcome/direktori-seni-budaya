<?php

use App\User;
use App\RitualCeremony;
use Faker\Generator as Faker;

$factory->define(RitualCeremony::class, function (Faker $faker) {

    return [
        'name'        => $faker->word,
        'detail'      => $faker->sentence,
        'description' => $faker->sentence,
        'creator_id'  => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
