<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ISBN' => 'required|min:1|max:10',
            'title' => 'required|string',
            'year' => 'required|min:4|max:4',
            'language' => 'required',
            'author_id' => 'required|exists:authors,id'
        ];
    }
}
