<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest, Role $role)
    {
        try {
            $input = $updateRequest->validated();
            $role->updateOrFail(
                $input
            );
            return redirect(route('admin.role.show', $role->id));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $role->id, 'Name' => $role->title, 'object' => Role::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('auth.update_error')])->withInput();
        }
    }
}
