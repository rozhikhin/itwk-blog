<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DestroyController extends Controller
{
    public function __invoke(Role $role)
    {
        try {
            $role->deleteOrFail();
            return redirect(route('admin.role.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $role->id, 'Email' => $role->title, 'object' => Role::class] );
            return Redirect::back()->withErrors(['msg' => __('auth.delete_error')])->withInput();
        }
    }
}
