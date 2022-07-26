<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => '\App\Http\Controllers\Admin\Blog\Post', 'prefix' => 'admin/blog/post'], function (){
    Route::get('', 'IndexController')->name('admin.blog.index');
    Route::get('/{id}', 'ShowController')->name('admin.blog.show')->where(['id' => '[0-9]+']);;
    Route::get('/create', 'CreateController')->name('admin.blog.create');
    Route::post('', 'StoreController')->name('admin.blog.create');
    Route::get('/{id}/edit', 'EditController')->name('admin.blog.edit')->where(['id' => '[0-9]+']);
    Route::patch('/{id}', 'UpdateController')->name('admin.blog.update')->where(['id' => '[0-9]+']);
    Route::delete('/{id}', 'DestroyController')->name('admin.blog.destroy')->where(['id' => '[0-9]+']);
});
