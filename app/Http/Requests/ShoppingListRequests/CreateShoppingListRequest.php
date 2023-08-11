<?php

namespace App\Http\Requests\ShoppingListRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShoppingListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The field title is required.',
            'title.string' => 'The field title should be a string.'
        ];
    }
}
