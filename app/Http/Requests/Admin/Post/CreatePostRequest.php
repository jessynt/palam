<?php

namespace App\Http\Requests\Admin\Post;

use App\Http\Requests\Requests;

class CreatePostRequest extends Requests
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|unique:posts|max:50',
            'slug'        => 'required|unique:posts',
            'category_id' => 'required|exists:categories,id',
            'body'        => 'required'
        ];
    }
}
