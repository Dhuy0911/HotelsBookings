<?php

namespace App\Http\Requests\Admin\RoomTypes;

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
            'name' => 'required|unique:room_types,name',
            'bed_types' => 'required'
            
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui long nhap ten phong',
           'name.unique' => 'Ten kieu phong da ton tai',
           'bed_types' => 'Vui long nhap kieu giuong'
        ];
    }
}
