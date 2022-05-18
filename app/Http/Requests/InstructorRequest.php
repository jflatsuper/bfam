<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorRequest extends FormRequest
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
            'biography'          => 'nullable|max:2000',
            'qualification'      => 'required|max:499',
            'phone'              => 'required|max:255',
            'twitter'            => 'nullable|max:255',
            'linkedin'           => 'nullable|max:255',
            'facebook'           => 'nullable|max:255',
            'instagram'          => 'nullable|max:255',
            'github'             => 'nullable|max:255',
            'address'            => 'required|max:255',
            'gender'             => 'required|in:Male,Female',
            'city'               => 'required|max:255',
            'state'              => 'required|max:255',
            'country'            => 'required|max:255',
            'language'           => 'required|max:255',
            'age'                => 'required|numeric|max:255',
        ];
    }
}
