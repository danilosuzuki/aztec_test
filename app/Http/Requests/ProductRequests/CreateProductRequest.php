<?php

namespace App\Http\Requests\ProductRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The field name should be a string.',
            'name.required' => 'The field name is required.',
        ];
    }
}
