<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserFormRequest extends FormRequest
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
        $user = Request::user();
        if ($this->isMethod("POST")){
            return [
                'student_id' => 'required|min:7|max:11|unique:users,student_id,'.$user->id,
                'name' => 'required|regex:/^[\pL\s\-]+$/u|min:5',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'password' => 'required|min:6',
            ];
        }
        return [
            'student_id' => 'required|min:7|max:11',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:5',
            'email' => 'required|email|',
            'password' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'student_id' => 'Student ID',
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Student ID is required',
            'name.required' => 'Student name is required',
            'email.required' => 'Email address is required',
            'password.required' => 'Password is required',

            'email.invalid' => 'Invalid email address',
            'name.alpha' => 'Invalid name provided',
            'email.unique' => 'A user already exists with that email',

            'student_id.min' => 'Student ID must be at least, 7 characters',
            'student_id.max' => 'Student ID cannot be more than 11 characters',
            'student_id.unique' => 'The student ID provided is already registered',
        ];
    }
}
