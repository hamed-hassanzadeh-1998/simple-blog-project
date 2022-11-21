<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('posts')->orderBy('created_at', 'desc')->paginate(30);
        //        dd($comments);
        return view('admin.comments.index', compact('comments'));
    }

    public function action(Request $request, $id)
    {
        if ($request->has('action')) {
            if ($request->input('action') == 'approved') {
                $comment = Comment::query()->findOrFail($id);
                $comment->status = 1;
                $comment->save();
                Session::flash('approved_comment', 'نظر کاربر تایید شد');
            }
            else {
                $comment = Comment::query()->findOrFail($id);
                $comment->status = 0;
                $comment->save();
                Session::flash('rejected_comment', 'نظر کاربر تایید نشد');
            }
        }


        return redirect()->route('comments.index');
    }

    public function edit($id)
    {
        $comment=Comment::query()->findOrFail($id);
        return view('admin.comments.edit', compact('comment'));
    }

    public function update(Request $request,$id)
    {
        $comment=Comment::query()->findOrFail($id);
        $comment->description=$request->input('description');
        $comment->save();
        Session::flash('update_comment', 'نظر با موفقیت ویرایش شد.');
        return redirect()->route('comments.index');
    }

    public function destroy($id)
    {
        $comment = Comment::query()->findOrFail($id);
        $comment->delete();
        Session::flash('delete_comment', 'نظر با موفقیت حذف شد.');
        return redirect()->route('comments.index');
    }
}
