<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;


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

// 管理画面
Route::group(['prefix' => '/admin', 'as' => 'admin.'], function(){
  // 管理画面トップ
  Route::get('/', 'admin\AdminController@index')->name('index');
  // 商品登録画面
  Route::get('/product/add', 'admin\ProductController@add')->name('product.add');
});

// ユーザー画面
Route::get('/',[UserController::class,'index']) -> name('user');

// ログイン画面
Route::get('/login',[LoginController::class,'showLogin']) -> name('login.form');

// ログイン認証
Route::post('/login',[LoginController::class,'login']) -> name('login');

// ログアウト
Route::post('/logout',[LoginController::class,'logout']) -> name('logout');

// 会員登録画面
Route::get('/register',[RegisterController::class,'showregister']) -> name('register.form');

Route::post('/register',[RegisterController::class,'back']) -> name('register.back');
// 確認画面
Route::post('/confirm',[RegisterController::class,'confirm']) -> name('register.confirm');

// 登録完了
Route::post('/complete',[RegisterController::class,'complete']) -> name('register.complete');
