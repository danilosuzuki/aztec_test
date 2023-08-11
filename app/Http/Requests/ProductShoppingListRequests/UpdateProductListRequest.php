<?php

namespace App\Http\Requests\ProductShoppingListRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required','integer'],
            'quantity' => ['required','integer','min:1']
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'The field id is required.',
            'id.integer' => 'The field id should be an integer.',
            'quantity.required' => 'The field quantity is required.',
            'quantity.integer' => 'The field quantity should be an integer.',
            'quantity.min' => 'The field quantity should be a positive number min = 1.',
        ];
    }
}
