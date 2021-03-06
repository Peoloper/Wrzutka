<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => request()->isMethod('put')
                ? 'nullable|string|min:8'
                : 'required|string|min:8|max:50',
            'image' => request()->isMethod('put')
                ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000'
                : 'required|mimes:jpeg,jpg,png,gif,svg|max:8000'
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
