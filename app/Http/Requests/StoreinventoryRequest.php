<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreinventoryRequest extends FormRequest
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
            'quantity' => 'required|integer|min:0|max:50',
            'availability' => 'required|max:30',
            'dish_id' => 'required|integer|exists:dishes,id'
        ];
    }

    public function messages()
    {
        return [
            'dish_id.exists' => "This dish does not exist!",
            'quantity.max' => "Quantity is limited to 50 pcs only"
        ];
    }
}
