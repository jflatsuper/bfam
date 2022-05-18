<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title'                 => 'required|max:255',
            'type'                  => 'required|max:255',
            'category'              => 'required|max:255',
            'price'                 => 'nullable|numeric|max:255',
            'hint'                  => 'required|max:1000',
            'language'              => 'required|max:255',
            'subtitle'              => 'require|boolean',
            'money_back_guarantee'  => 'nullable|numeric|max:255',
            'cover_image'           => 'required|image|max:200',
            'description'           => 'required|max:4000',
        ];
    }
}
