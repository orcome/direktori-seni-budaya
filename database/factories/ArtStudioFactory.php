<?php

use App\User;
use App\ArtStudio;
use App\SubDistrict;
use Faker\Generator as Faker;

$factory->define(ArtStudio::class, function (Faker $faker) {

    return [
        'name'            => $faker->word,
        'sub_district_id' => function () {
            return factory(SubDistrict::class)->create()->id;
        },
        'village'         => $faker->word,
        'leader'          => $faker->name,
        'art_type'        => $faker->word,
        'building'        => 0, // 0: Ada, 1: Tidak Ada
        'description'     => $faker->sentence,
        'creator_id'      => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
