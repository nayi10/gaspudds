<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
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
        if($this->isMethod('POST'))
        {
            return [
                'title' => 'bail|required|max:200',
                'content' => 'required|min:200',
                'publisher' => 'required',
                'contact' => 'required',
                'venue' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'banner' => 'required|image|mimes:png,jpg,jpeg'
            ];
        } else {
            return [
                'title' => 'bail|required|max:200',
                'content' => 'required|min:200',
                'publisher' => 'required',
                'contact' => 'required',
                'venue' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => "Provide event title",
            'content.required' => "Provide a decription",
            'publisher.required' => "Publisher is required",
            'contact.required' => "Add publisher's contact",
            'venue.required' => 'Venue cannot be blank',
            'banner.required' => "Event banner not selected",
            'end_date.required' => "Indicate end date",
            'start_date.required' => "Indicate start date",
            'content.min' => 'Event description is too short',
            'title.max' => 'Title must not be more than 200 characters',
            'banner.mimes' => 'Banner must be a .png or .jpg image',
            'banner.image' => 'Banner must be an image'
        ];
    }
}
