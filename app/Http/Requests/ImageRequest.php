<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //request keys
            'image' => 'file|required|mimes:jpeg,bmp,png|max:2048',
            'width' => 'required|numeric|min:0|not_in:0|max:1000',
            'height' => 'required|numeric|min:0|not_in:0|max:1000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => 'Please upload an image.',
            'image.max' => 'Please upload and image less 2mb in size.',
            'width.min' => 'Width should be between 0 and 1001',
            'width.required' => 'please add the width value',
            'width.max' => 'Width should be between 0 and 1001',
            'height.min' => 'Height should be between 0 and 1001',
            'height.required' => 'please add the height value',
            'height.max' => 'Height should be between 0 and 1001',
        ];
    }
}
