<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;



class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)
    {
        $input = $storeRequest->validated();
        try {
            Role::firstOrCreate(['title' => $input['title']], $input);
            return redirect(route('admin.role.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Role::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('auth.save_error')])->withInput();
        }
    }
}
