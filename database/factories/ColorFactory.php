<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Color::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fa_IR');
    return [
        'name' => $faker->colorName,
        'hex_code' => $faker->hexColor,
    ];
});
