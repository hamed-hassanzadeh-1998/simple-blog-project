<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('photo', 'category', 'user')->get();
        return view('admin.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('admin.posts.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //dd(make_slug($request->input('title')));
        $post = new Post();
        if ($file = $request->file('first_photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $post->photo_id = $photo->id;
        }
        $post->title = $request->input('title');
        if ($request->input('slug')) {
            $post->slug = make_slug($request->input('slug'));
        } else {
            $post->slug = make_slug($post->title);
        }

        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->user_id = Auth::id();
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->status = $request->input('status');
        $post->save();
        Session::flash('add_post', "مطلب جدید با موفقیت اضافه شد");
        return redirect('/admin/posts/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::query()->with('category')->where('id',$id)->first();
        $categories=Category::query()->pluck('title','id');
        return view('admin.posts.edit', compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $post=Post::query()->findOrFail($id);
        if ($file = $request->file('first_photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $post->photo_id = $photo->id;
        }
        $post->title = $request->input('title');
        if ($request->input('slug')) {
            $post->slug = make_slug($request->input('slug'));
        } else {
            $post->slug = make_slug($post->title);
        }

        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->status = $request->input('status');
        $post->save();
        Session::flash('update_post', "مطلب با موفقیت ویرایش شد");
        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $photo=Photo::findOrFail($post->photo_id);
        unlink(public_path().$post->photo->path);
        $photo->delete();
        $post->delete();
        Session::flash('delete_post','مطلب با موفقیت حذف شد');
        return redirect('/admin/posts');
    }
}
