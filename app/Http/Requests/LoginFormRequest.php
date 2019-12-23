<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'student_id' => 'required|string|min:7|max:11',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Student ID is required',
            'student_id.max' => 'Student ID must be less than 12 characters',
            'student_id.min' => 'Student ID must be at least 7 characters',
            'password.required' => 'Password cannot be empty',
        ];
    }
}
