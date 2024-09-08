<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255|min:6', // phải đặt tên input giốg tên cột thì ms sử dụng được unique
            'config_value' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên.',
            'contents.required' => 'Không được bỏ trống mô tả',
        ];
    }
}
