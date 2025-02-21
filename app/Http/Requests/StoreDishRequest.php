<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'dish_name' => 'required|max:255|unique:dishes,dish_name',
            'price' => 'required|numeric|min:0|max:9999.99',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'dish_name.unique' => 'This Dish already exists',
            'dish_name.max' => 'The Dish name should not exceed 255 characters',
            'category_id.exists' => 'This Category does not exist',
        ];
    }
}
