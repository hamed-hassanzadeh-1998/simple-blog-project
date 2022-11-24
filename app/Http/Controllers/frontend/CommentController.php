<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::query()->findOrFail($postId);
        if ($post) {
            $comment = new Comment();
            $comment->description = $request->input('description');
            $comment->post_id=$post->id;
            $comment->status = 0;
            $comment->save();
        }
        Session::flash('add_comment', ' نظر با موفقیت ثبت شد و در انتظار تایید قرار گرفت.');
        return redirect()->route('f.posts.show',['slug'=>$post->slug]);
    }

    public function reply(Request $request)
    {
        $postId =$request->input('post_id');
        $parentId =$request->input('parent_id');
        $post=Post::query()->findOrFail($postId);
        if ($post) {
            $comment = new Comment();
            $comment->description = $request->input('description');
            $comment->post_id=$post->id;
            $comment->parent_id=$parentId;
            $comment->status = 0;
            $comment->save();
        }
        Session::flash('add_comment', ' نظر با موفقیت ثبت شد و در انتظار تایید قرار گرفت.');
        return back();
    }
}
