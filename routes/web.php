<?php

use App\Http\Controllers\backend\admin\CategoryController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\admin\DashboardController;
use App\Http\Controllers\backend\FavoriteController;
use App\Http\Controllers\backend\LikeController;
use App\Http\Controllers\backend\admin\PermissionController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\admin\RoleController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\TopController;
use App\Http\Controllers\backend\admin\UserController;
use App\Http\Controllers\backend\MemController;
use App\Http\Controllers\backend\admin\TagController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\WaitingController;
use App\Http\Controllers\frontend\CategoryController as FrontCategoryController;
use App\Http\Controllers\frontend\TagController as FrontTagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/waiting', [WaitingController::class, 'index'])->name('waiting');

Route::get('mem/{id}/getComments/{mem}',[CommentController::class, 'getComments']);
Route::get('/mem/{mem}/{slug}' ,[MemController::class, 'show'])->name('mem.show');

Route::group(['middleware'=>['auth']], function ()
{
    Route::post('/mem' ,[MemController::class, 'store']);
    Route::put('/mem/{mem}' ,[MemController::class, 'update'])->name('mem.update');
    Route::delete('/mem/{mem}' ,[MemController::class, 'destroy'])->name('mem.destroy');

    Route::get('favorite', [FavoriteController::class, 'index'])->name('favorite');
    Route::post('favorite/{mem}', [FavoriteController::class  ,'favoriteMem']);
    Route::post('unfavorite/{mem}', [FavoriteController::class,'unFavoriteMem']);

    Route::post('like/{mem}', [LikeController::class  ,'likeMem']);
    Route::post('unlike/{mem}', [LikeController::class,'unLikeMem']);
    Route::get('getlikes/{mem}', [LikeController::class,'getLikes']);

    Route::get('settings', [SettingController::class,'index'])->name('setting');
    Route::post('setting/password', [SettingController::class,'updatePassword'])->name('update.password');
    Route::post('setting/avatar', [SettingController::class,'updateAvatar'])->name('update.avatar');

    Route::get('/profile/{userName}',[ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{userName:name}/comments',[CommentController::class, 'getCommentsUser'])->name('user.comments.get');

    Route::get('top', [TopController::class,'index'])->name('top.index');
    Route::post('mem/{id}/store',[CommentController::class, 'store']);

    Route::get('category/{category:slug}', FrontCategoryController::class)->name('front.category');
    Route::get('tag/{tag:name}', FrontTagController::class)->name('front.tag');
});

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware'=>['auth', 'role:Admin']], function ()
{
    Route::get('/dashboard',DashboardController::class)->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);

    Route::get('/permission', PermissionController::class)->name('permission.index');
});

Auth::routes();

