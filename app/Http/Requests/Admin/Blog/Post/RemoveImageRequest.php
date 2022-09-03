<?php

namespace App\Http\Requests\Admin\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;

class RemoveImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'isRemoveImage' => 'nullable|integer',
//            'post' => 'nullable|integer',
        ];
    }
}
