<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'name' => 'required|max:100|min:3', 
            'email' => 'required|email|unique:users', // unique|tên_bảng
            'password' => 'required|confirmed|min:4',
            'confirm_password' => 'required|same:password|min:4',
            // 'roles' => 'required|array',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên.',
            'name.max' => 'Tên không được vượt quá 100 ký tự.',
            'name.min' => 'Tên phải có ít nhất 3 ký tự.',
            'name.unique' => 'Tên đã tồn tại trong hệ thống, vui lòng chọn tên khác.',
            
            'email.required' => 'Không được bỏ trống địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại trong hệ thống, vui lòng chọn địa chỉ email khác.',
            
            'password.required' => 'Không được bỏ trống mật khẩu.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất 4 ký tự.',
            
            'confirm_password.required' => 'Không được bỏ trống xác nhận mật khẩu.',
            'confirm_password.same' => 'Xác nhận mật khẩu không khớp với mật khẩu.',
            'confirm_password.min' => 'Xác nhận mật khẩu phải có ít nhất 4 ký tự.',
            
            // 'roles.required' => 'Vui lòng chọn ít nhất một vai trò.',
            // 'roles.array' => 'Dữ liệu vai trò phải là một mảng.',
        ];
    }
    

}
