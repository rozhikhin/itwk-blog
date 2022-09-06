<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;

class CreateController extends Controller
{
    public function __invoke()
    {
        $roles = Role::all();
        return view('admin.blog.post.create', compact('roles'));
    }
}
