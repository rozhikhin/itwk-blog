<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(10);

        return view('admin.role.index', compact('roles'));
    }


}
