<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowRequest extends FormRequest
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
            'librarianId' => 'required|exists:librarians,id',
            'bookItemId' => 'required|exists:book_items,id',
            'issue_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'nullable|boolean',
            'librarian_id' => 'integer|min:1'
        ];
    }
}
