<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterOwnerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image_idcard_front' => 'required|image|max:2048',
            'image_idcard_back' => 'required|image|max:2048',
            'image_business_license' => 'required|image|max:2048',
            'image_hotels' => 'required|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image_idcard_front.required' => 'Please select the front ID card image',
            'image_idcard_front.image' => 'The front ID card image must be in image format',
            'image_idcard_front.max' => 'The size of the front ID card image should not exceed 2MB',

            'image_idcard_back.required' => 'Please select the back ID card image',
            'image_idcard_back.image' => 'The back ID card image must be in image format',
            'image_idcard_back.max' => 'The size of the back ID card image should not exceed 2MB',

            'image_business_license.required' => 'Please select the business license image',
            'image_business_license.image' => 'The business license image must be in image format',
            'image_business_license.max' => 'The size of the business license image should not exceed 2MB',

            'image_hotels.required' => 'Please select the hotels image',
            'image_hotels.image' => 'The hotels image must be in image format',
            'image_hotels.max' => 'The size of the hotels image should not exceed 2MB'
        ];
    }
}
