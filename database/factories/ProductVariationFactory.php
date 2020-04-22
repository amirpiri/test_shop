<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\ProductVariation::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fa_IR');
    return [
        'price' => $faker->randomNumber(6),
    ];
});
