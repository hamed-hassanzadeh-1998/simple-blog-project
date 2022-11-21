<?php


use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\MainController;
use App\Http\Controllers\frontend\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'Admin'], function () {
    Route::resource('admin/users', AdminUserController::class);
    Route::resource('admin/posts', AdminPostController::class);
    Route::resource('admin/category', AdminCategoryController::class);
    Route::resource('admin/photos', AdminPhotoController::class);
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('admin/photos/upload', [AdminPhotoController::class, 'upload'])->name('photos.upload');
    Route::get('admin/comment', [CommentController::class, 'index'])->name('comments.index');
    Route::get('admin/comments/{id}', [CommentController::class, 'edit'])->name('comments.edit');
    Route::patch('admin/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('admin/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('admin/actions/{id}', [CommentController::class, 'action'])->name('comments.action');
});

Route::get('/', [MainController::class, 'index']);
Route::get('posts/{slug}', [PostController::class, 'show'])->name('f.posts.show');
Route::get('search/', [PostController::class, 'searchTitle'])->name('f.posts.search');


require __DIR__ . '/auth.php';
