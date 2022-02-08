<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\FavoriteController;
use App\Http\Controllers\backend\LikeController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\TopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\MemController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\frontend\WaitingController;
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

Route::post('/mem' ,[MemController::class, 'store']);
Route::get('/mem/{mem}/{slug?}' ,[MemController::class, 'show'])->name('mem.show');
Route::put('/mem/{mem}' ,[MemController::class, 'update'])->name('mem.update');
Route::delete('/mem/{mem}' ,[MemController::class, 'destroy'])->name('mem.destroy');

Route::get('/profile/{user}',[ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/comments',[CommentController::class, 'getCommentsUser'])->name('user-comments-get');
Route::get('/mem/getComments/{mem}',[CommentController::class, 'getComments']);


Route::group(['middleware'=>['auth']], function ()
{
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);

    Route::post('/mem/comment/store',[CommentController::class, 'store']);
    Route::get('/mem/getComments/{mem}',[CommentController::class, 'getComments']);

    Route::get('favorite', [FavoriteController::class, 'index'])->name('favorite');
    Route::post('favorite/{mem}', [FavoriteController::class  ,'favoriteMem']);
    Route::post('unfavorite/{mem}', [FavoriteController::class,'unFavoriteMem']);

    Route::post('like/{mem}', [LikeController::class  ,'likeMem']);
    Route::post('unlike/{mem}', [LikeController::class,'unLikeMem']);
    Route::get('getlikes/{mem}', [LikeController::class,'getLikes']);

    Route::get('settings', [SettingController::class,'index'])->name('setting');
    Route::get('top', [TopController::class,'index'])->name('top.index');
});

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware'=>['auth']], function ()
{
//    Route::resource('user', UserController::class)->middleware('role:Admin');
//    Route::resource('role', RoleController::class)->middleware('role:Admin');
//    Route::resource('profile', ProfileController::class);
//
//     Route::get('/permission', PermissionController::class)->name('permission.index')->middleware('role:Admin');

});


Auth::routes();

