<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'required|max:100|min:6', // unique:tên_bảng
            'contents' => 'required',
            'image_path' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên.',
            'contents.required' => 'Không được bỏ trống mô tả',
            'image_path.required' => 'Không được bỏ trống mô tả',
        ];
    }
}
