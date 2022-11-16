<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(2);
        return view('admin.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        if ($request->input('slug')) {
            $category->slug = make_slug($request->input('slug'));
        } else {
            $category->slug = make_slug($category->title);
        }

        $category->title = $request->input('meta_description');
        $category->title = $request->input('meta_keywords');
        $category->save();
        Session::flash('add_category', 'دسته بندی جدید با موفقیت ایجاد شد.');
        return view('admin.category.index');
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
        $category=Category::query()->findOrFail($id);
        return view('admin.category.edit',compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category=new Category();
        $category->title = $request->input('title');
        if ($request->input('slug')) {
            $category->slug = make_slug($request->input('slug'));
        } else {
            $category->slug = make_slug($category->title);
        }
        $category->title = $request->input('meta_description');
        $category->title = $request->input('meta_keywords');
        $category->save();
        Session::flash('update_category', 'دسته بندی با موفقیت به روز رسانی شد.');
        return view('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::query()->findOrFail($id);
        $category->delete();
        Session::flash('delete_category', 'دسته بندی با موفقیت حذف شد.');
        return view('admin.category.index');
    }
}
