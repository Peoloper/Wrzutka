<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => request()->isMethod('put')
                ? 'required|string|min:5|max:50|unique:memes,title,'.$this->mem->id
                : 'required|string|unique:memes|min:5|max:50',
            'content' => [
                'max: 100'
            ],
            'category_id' => [
                'required',
                'integer'
            ],
            'tags' => [
                'required',
                'array'
            ]
            ,
            'image' => 'required|image64:jpeg,jpg,png',

            'is_published' => ['boolean']
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
