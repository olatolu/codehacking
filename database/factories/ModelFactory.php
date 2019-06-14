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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'role_id' => $faker->numberBetween(1,3),
        'photo_id' => 1,
        'is_active' => 1,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1,10),
        'photo_id' => 1,
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraph(rand(10,15), true),
        'slug' => $faker->slug()
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['administrator','author','subscriber'])
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['PHP','JAVA','JAVA SCRIPT','C++','PARTY','MUSIC','BAGS','ENTERTAINMENT','LOVE','NEWS'])
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'file' => ''
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => rand(1,10),
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => 'http://placehold.it/64x64',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true)
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => 'http://placehold.it/64x64',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true)
    ];
});
