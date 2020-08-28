<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('author')->where('status',Blog::PUBLISHED)->get();
        $categories = Category::get(['id','name']);
        // dd($blogs);
        return view('welcome')->with([
            'blogs' => $blogs,
            'categories' => $categories,
        ]);
    }

    public function show($slug,Blog $blog)
    {
        return view('blog')->with([
            'blog' => $blog,
        ]);
    }

}
