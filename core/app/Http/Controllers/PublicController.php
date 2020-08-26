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
        // dd($blogs->first()->thumbnail_image);
        return view('welcome')->with([
            'blogs' => $blogs,
            'categories' => $categories,
        ]);
    }

}
