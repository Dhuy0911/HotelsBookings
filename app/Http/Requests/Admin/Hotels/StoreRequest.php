<?php

namespace App\Http\Requests\Admin\Hotels;

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
            'name' => 'required|unique:hotels,name',
            'address' => 'required',
            'location_id' => 'required',
            'hotline' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui long nhap ten khach san',
            'address.required' => 'Vui long nhap dia chi khach san',
            'location_id.required' => 'Vui long nhap dia diem khach san',
            'hotline.required' => 'Vui long nhap so dien thoai khach san',
        ];
    }
}
