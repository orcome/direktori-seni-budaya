<?php

use App\User;
use App\SubDistrict;
use App\CulturalHeritage;
use Faker\Generator as Faker;

$factory->define(CulturalHeritage::class, function (Faker $faker) {

    return [
        'name'            => $faker->word,
        'type'            => $faker->word,
        'sub_district_id' => function () {
            return factory(SubDistrict::class)->create()->id;
        },
        'village'         => $faker->word,
        'description'     => $faker->sentence,
        'creator_id'      => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
