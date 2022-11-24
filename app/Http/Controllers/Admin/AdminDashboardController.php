<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $postsCount=Post::query()->count();
        $categoriesCount=Category::query()->count();
        $photosCount=Photo::query()->count();
        $usersCount=User::query()->count();
        $posts=Post::query()->orderBy('created_at','DESC')->limit(4)->with('category')->get();
        $users=User::query()->orderBy('created_at','DESC')->limit(4)->get();

        return view('admin.dashboard.index',compact(['postsCount','categoriesCount','photosCount','usersCount','posts','users']));
    }
}
