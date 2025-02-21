<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'cat_name' => 'sometimes|max:255|unique:categories,cat_name',
            'description' => 'sometimes|max:255'
        ];
    }

    public function messages()
    {
        return [
            'cat_name.unique' => 'This Category already exist',
            'cat_name.max' => 'The Category name should not exceed 255 characters'
        ];
    }
}
