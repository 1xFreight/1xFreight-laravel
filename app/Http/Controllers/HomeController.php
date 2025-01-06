<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\MetaTag;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->take(3)->get();
        $meta_tag = MetaTag::where('page', 'home')->first();

        return view('home', compact('blogs', 'meta_tag'));
    }
}
