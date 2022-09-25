<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest, User $user)
    {
        try {
            $input = $updateRequest->validated();
            $user->updateOrFail(
                $input
            );
            return redirect(route('admin.user.show', $user->id));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $user->id, 'Name' => $user->name, 'object' => User::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('auth.update_error')])->withInput();
        }
    }
}
