<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|max:255',
            'page_count' => 'required|integer|min:1',
            'short_description' => 'required|max:5000',
            'image' => 'image',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'author_id.exists' => 'Author not found',
            'page_count.integer'  => 'Page count is to big',
            'image.image' => 'Invalid image'
        ];
    }
}
