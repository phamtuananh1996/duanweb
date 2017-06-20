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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'user_name'=>$faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'code' => $faker->postcode,
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Categories::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->state,
    ];
});


$factory->define(App\Question::class, function ($faker) {
    return [
        'question_title' => $faker->title,
        'question_content' => $faker->paragraph,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },

        'categories_id' => function () {
            return factory(App\Categories::class)->create()->id;
        },
        
    ];
});
