<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class EditController extends Controller
{
    public function __invoke(Role $role)
    {
        return view('admin.role.edit', compact('role', ));
    }
}
