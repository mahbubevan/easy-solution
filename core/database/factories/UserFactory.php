<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\Blog;
use App\Category;
use App\Image;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->name,
        'username' => $faker->unique()->userName,
        'slug' => Str::slug($name),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('user'), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('admin'), // password
    ];
});

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $test = 'PHP TEST',
        'slug' => Str::slug($test),
        'description' => $faker->paragraph,
        'tags' => json_encode(['0'=>'php','1'=>'js','2'=>'evan'],JSON_FORCE_OBJECT),
        'status' => $faker->randomElement([Blog::PUBLISHED,Blog::UNPUBLISHED]), // password
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
    ];
});

$factory->define(Image::class, function (Faker $faker) {
    return [
        'blog_id' => Blog::all()->random()->id,
        'caption' => $faker->name,
        'path' => $faker->imageUrl(400,400),
    ];
});
