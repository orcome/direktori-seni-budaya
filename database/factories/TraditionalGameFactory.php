<?php

use App\User;
use App\TraditionalGame;
use Faker\Generator as Faker;

$factory->define(TraditionalGame::class, function (Faker $faker) {

    return [
        'name'        => $faker->word,
        'tools'       => $faker->sentence,
        'detail'      => $faker->sentence,
        'description' => $faker->sentence,
        'creator_id'  => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
