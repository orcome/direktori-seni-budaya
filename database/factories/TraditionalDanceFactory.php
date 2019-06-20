<?php

use App\User;
use App\TraditionalDance;
use Faker\Generator as Faker;

$factory->define(TraditionalDance::class, function (Faker $faker) {

    return [
        'name'          => $faker->word,
        'dance_type'    => $faker->word,
        'choreographer' => $faker->word,
        'description'   => $faker->sentence,
        'creator_id'    => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
