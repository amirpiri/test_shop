<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fa_IR');
    return [
        'name' => $faker->name,
        'description' => $faker->realText(),
    ];
});
