<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::with('category', 'photo', 'user')->where('id', $id)->first();;
        return view('frontend.post.show', compact('post'));
    }
}
