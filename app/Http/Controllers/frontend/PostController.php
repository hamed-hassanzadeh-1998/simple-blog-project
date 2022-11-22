<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::with(['category', 'photo', 'user',
        'comments'=>function($q){
            $q->where('status',1)->where('parent_id',null);
        }
       ])->where('slug', $slug)->first();
        $categories=Category::all();
        return view('frontend.posts.show', compact(['post','categories']));
    }
    public function searchTitle(Request $request)
    {
        $query=$request->input('title');
        //dd($query);
        $posts = Post::with('category', 'photo', 'user','comments')->where('title','like',"%".$query."%")->orderBy('created_at','desc')->paginate(3);
        $categories=Category::all();
        return view('frontend.posts.search', compact(['posts','categories','query']));

    }
}
