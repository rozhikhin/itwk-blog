<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DestroyController extends Controller
{
    public function __invoke(User $user)
    {
        try {
            $user->deleteOrFail();
            return redirect(route('admin.user.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $user->id, 'Email' => $user->email, 'object' => User::class] );
            return Redirect::back()->withErrors(['msg' => __('auth.delete_error')])->withInput();
        }
    }
}
