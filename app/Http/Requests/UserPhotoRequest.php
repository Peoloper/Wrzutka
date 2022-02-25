<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPhotoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'img' => [
                'required',
                'mimes:jpeg,jpg,png|max:8000'
            ]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
