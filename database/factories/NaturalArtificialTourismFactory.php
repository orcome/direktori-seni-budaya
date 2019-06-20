<?php

use App\User;
use Faker\Generator as Faker;
use App\NaturalArtificialTourism;

$factory->define(NaturalArtificialTourism::class, function (Faker $faker) {

    return [
        'name'        => $faker->word,
        'category'    => 0, //0:Wisata Alam, 1:Wisata Buatan
        'location'    => $faker->word,
        'description' => $faker->sentence,
        'creator_id'  => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
