<?php


use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware'=>'Admin'],function (){
    Route::resource('admin/users',AdminUserController::class);
    Route::resource('admin/posts',AdminPostController::class);
    Route::resource('admin/category',AdminCategoryController::class);
    Route::resource('admin/photos',AdminPhotoController::class);
    Route::get('admin/dashboard',[AdminDashboardController::class,'index'])->name('dashboard.index');
    Route::get('admin/photos/upload',[AdminPhotoController::class,'upload'])->name('photos.upload');
});




require __DIR__.'/auth.php';
