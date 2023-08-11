<?php

namespace App\Http\Requests\ProductShoppingListRequests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required','integer'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'The field id is required.',
            'id.integer' => 'The field id should be an integer.',
        ];
    }
}
