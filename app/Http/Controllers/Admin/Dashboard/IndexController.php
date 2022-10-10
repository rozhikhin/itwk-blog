<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $usersCount = User::all()->count();
        $categoriesCount = Category::all()->count();
        $postsCount= Post::all()->count();
        $tagsCount = Tag::all()->count();
        return view('admin.dashboard.index', compact('usersCount', 'categoriesCount', 'postsCount', 'tagsCount'));
    }
}
