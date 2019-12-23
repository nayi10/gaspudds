<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
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
            'image' => 'required|image|mimes:png,jpeg,jpg,gif',
            'category' => 'required|alpha_num|max:50'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Select an image to upload',
            'image.image' => 'The file must be an image file',
            'image.mimes' => 'Only .jpg, .png and .gif images are accepted',
            'category.required' => 'Please specify a category',
            'category.max' => 'Only 50 character maximum category names are accepted',
            'category.alpha_num' => 'Special characters not allowed'
        ];
    }
}
