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

Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => 'admin'], function (){
    Route::group(['namespace' => 'Dashboard', 'prefix' => ''], function (){
        Route::get('', 'IndexController')->name('admin.dashboard.index');
    });

    Route::group(['namespace' => 'Blog\Post', 'prefix' => 'blog/post'], function (){
        Route::get('', 'IndexController')->name('admin.blog.post.index');
        Route::get('/{id}', 'ShowController')->name('admin.blog.post.show')->where(['id' => '[0-9]+']);;
        Route::get('/create', 'CreateController')->name('admin.blog.post.create');
        Route::post('', 'StoreController')->name('admin.blog.create');
        Route::get('/{id}/edit', 'EditController')->name('admin.blog.post.edit')->where(['id' => '[0-9]+']);
        Route::patch('/{id}', 'UpdateController')->name('admin.blog.post.update')->where(['id' => '[0-9]+']);
        Route::delete('/{id}', 'DestroyController')->name('admin.blog.post.destroy')->where(['id' => '[0-9]+']);
    });

    Route::group(['namespace' => 'Blog\Tag', 'prefix' => 'blog/tag'], function (){
        Route::get('', 'IndexController')->name('admin.blog.tag.index');
        Route::get('/{id}', 'ShowController')->name('admin.blog.tag.show')->where(['id' => '[0-9]+']);;
        Route::get('/create', 'CreateController')->name('admin.blog.tag.create');
        Route::post('', 'StoreController')->name('admin.blog.tag.create');
        Route::get('/{id}/edit', 'EditController')->name('admin.blog.tag.edit')->where(['id' => '[0-9]+']);
        Route::patch('/{id}', 'UpdateController')->name('admin.blog.tag.update')->where(['id' => '[0-9]+']);
        Route::delete('/{id}', 'DestroyController')->name('admin.blog.tag.destroy')->where(['id' => '[0-9]+']);
    });

    Route::group(['namespace' => 'Blog\Category', 'prefix' => 'blog/category'], function (){
        Route::get('', 'IndexController')->name('admin.blog.category.index');
        Route::get('/{id}', 'ShowController')->name('admin.blog.category.show')->where(['id' => '[0-9]+']);;
        Route::get('/create', 'CreateController')->name('admin.blog.category.create');
        Route::post('', 'StoreController')->name('admin.blog.category.create');
        Route::get('/{id}/edit', 'EditController')->name('admin.blog.category.edit')->where(['id' => '[0-9]+']);
        Route::patch('/{id}', 'UpdateController')->name('admin.blog.category.update')->where(['id' => '[0-9]+']);
        Route::delete('/{id}', 'DestroyController')->name('admin.blog.category.destroy')->where(['id' => '[0-9]+']);
    });

});

