<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::with('category', 'photo', 'user')->where('slug', $slug)->first();
        $categories=Category::all();
        return view('frontend.posts.show', compact(['post','categories']));
    }
}
