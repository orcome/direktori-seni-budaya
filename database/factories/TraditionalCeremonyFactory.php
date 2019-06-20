<?php

use App\User;
use App\TraditionalCeremony;
use Faker\Generator as Faker;

$factory->define(TraditionalCeremony::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'creator_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
