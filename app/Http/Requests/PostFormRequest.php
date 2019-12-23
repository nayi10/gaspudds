<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'title' => 'required|min:3|max:800',
            'content' => 'required|min:500'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post title is required',
            'title.min' => 'The title is too short',
            'content.min' => 'The description is too short',
            'content.required' => 'Please enter post description',
        ];
    }
}
