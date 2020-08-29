<?php

use App\Admin;
use App\Blog;
use App\Category;
use App\Image;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class,5)->create();
        // factory(User::class,5)->create();
        // factory(Category::class,10)->create();

        // factory(Blog::class, 5)->create()
        //     ->each(function ($blog) {
        //         $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
        //         $blog->categories()->attach($categories);

        //     });

        // factory(Image::class,20)->create();
    }
}
