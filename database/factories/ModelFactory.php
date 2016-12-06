<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username'       => $faker->userName,
        'email'          => $faker->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id'       => '1',
        'category_id'   => mt_rand(1, 3),
        'title'         => $faker->sentence(),
        'body'          => '3234',
        'body_original' => '3423',
        'description'   => '342423',
        'slug'          => $faker->slug(8)
    ];
});


$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
    ];
});
$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
        'color' => $faker->rgbCssColor
    ];
});
