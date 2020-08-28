<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('images','categories')->where('user_id',auth()->user()->id)->get();

        return view('home')->with([
            'blogs' => $blogs,
        ]);

    }

    public function create()
    {
        return view('blogs.create');
    }

}

