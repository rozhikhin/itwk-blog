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
//        Route::get('/{post}', 'ShowController')->name('admin.blog.post.show')->where(['post' => '[0-9]+']);
        Route::get('/create', 'CreateController')->name('admin.blog.post.create');
        Route::post('', 'StoreController')->name('admin.blog.post.store');
        Route::get('/{post}/edit', 'EditController')->name('admin.blog.post.edit')->where(['post' => '[0-9]+']);
        Route::patch('/{post}', 'UpdateController')->name('admin.blog.post.update')->where(['post' => '[0-9]+']);
        Route::patch('/remove-image/{post}', 'RemoveImageController')->name('admin.blog.post.removeImage')->where(['post' => '[0-9]+']);
        Route::delete('/{post}', 'DestroyController')->name('admin.blog.post.destroy')->where(['post' => '[0-9]+']);
    });

    Route::group(['namespace' => 'Blog\Tag', 'prefix' => 'blog/tag'], function (){
        Route::get('', 'IndexController')->name('admin.blog.tag.index');
        Route::get('/{tag}', 'ShowController')->name('admin.blog.tag.show')->where(['tag' => '[0-9]+']);
        Route::get('/create', 'CreateController')->name('admin.blog.tag.create');
        Route::post('', 'StoreController')->name('admin.blog.tag.store');
        Route::get('/{tag}/edit', 'EditController')->name('admin.blog.tag.edit')->where(['tag' => '[0-9]+']);
        Route::patch('/{tag}', 'UpdateController')->name('admin.blog.tag.update')->where(['tag' => '[0-9]+']);
        Route::delete('/{tag}', 'DestroyController')->name('admin.blog.tag.destroy')->where(['tag' => '[0-9]+']);
    });

    Route::group(['namespace' => 'Blog\Category', 'prefix' => 'blog/category'], function (){
        Route::get('', 'IndexController')->name('admin.blog.category.index');
        Route::get('/create', 'CreateController')->name('admin.blog.category.create');
        Route::get('/{category}', 'ShowController')->name('admin.blog.category.show')->where(['id' => '[0-9]+']);
        Route::post('', 'StoreController')->name('admin.blog.category.store');
        Route::get('/{category}/edit', 'EditController')->name('admin.blog.category.edit')->where(['category' => '[0-9]+']);
        Route::patch('/{category}', 'UpdateController')->name('admin.blog.category.update')->where(['category' => '[0-9]+']);
        Route::delete('/{category}', 'DestroyController')->name('admin.blog.category.destroy')->where(['category' => '[0-9]+']);
    });

});

