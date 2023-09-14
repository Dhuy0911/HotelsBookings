<?php

namespace App\Http\Requests\Admin\Rooms;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'bed' => 'required',
            'persons' => 'required',
            'price' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui long nhap ten phong',
            'bed.required' => 'Vui long nhap so giuong',
            'persons.required' => 'Vui long nhap so nguoi',
            'price.required' => 'Vui long nhap gia phong',
        ];
    }
}
