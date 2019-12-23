<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningMaterialRequest extends FormRequest
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
            'title' => 'bail|required',
            'category' => 'required',
            'document' => 'required|mimes:pdf,epub,docx,doc,pptx,ppt,odt,odp'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Document title is required',
            'category.required' => 'Please category is required',
            'document.required' => 'No document selected',
            'document.mime' => 'Only .pdf, .doc, .docx, .epub, .ppt, .pptx, .odg, .odp files are accepted',
        ];
    }
}
