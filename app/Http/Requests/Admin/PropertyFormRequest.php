<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:8', 'max:255'],
            'surface' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:8', 'max:510'],
            'rooms' => ['required', 'integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:-1'],
            'city' => ['required', 'min:2', 'max:255'],
            'address' => ['required', 'min:8', 'max:255'],
            'postal_code' => ['required', 'min:5'],
            'sold' => ['boolean'],
            'options' => ['array', 'exists:options,id'],
        ];
    }
}
