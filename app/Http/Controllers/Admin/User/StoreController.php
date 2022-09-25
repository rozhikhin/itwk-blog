<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)
    {
        $input = $storeRequest->validated();
        try {
            $input['password'] = Hash::make(Str::random());
            User::firstOrCreate($input);
            return redirect(route('admin.user.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => User::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('auth.save_error')])->withInput();
        }
    }
}
