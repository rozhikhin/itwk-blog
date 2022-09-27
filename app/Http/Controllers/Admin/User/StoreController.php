<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\CreatePasswordMail;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)
    {
        $input = $storeRequest->validated();
        try {
            $password = Str::random();
            $input['password'] = Hash::make($password);
            User::firstOrCreate(['email' => $input['email']], $input);
            Mail::to($input['email'])->send(new CreatePasswordMail($password));
            return redirect(route('admin.user.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => User::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('auth.save_error')])->withInput();
        }
    }
}
