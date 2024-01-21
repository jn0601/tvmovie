<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Brian2694\Toastr\Facades\Toastr;

class CustomersRequest extends FormRequest
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
        // dd($this);
        $dataRules = [
            'username' => 'required|regex:/^[a-zA-Z0-9]+$/|unique:customers,username,'.$this->customer,
            'email' => 'required|email|unique:customers,email,'.$this->customer,
            'phone' => 'required|unique:customers,phone,'.$this->customer,
        ];

        return $dataRules;
    }

    public function messages() 
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.max' => 'Tên đăng nhập không được quá 255 kí tự',
            'email.unique' => 'Email đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ];
    }

    public function WithValidator($validator) 
    {
        $validator->after(function($validator) {
            if($validator->errors()->count() > 0) {
                Toastr::error('Thêm dữ liệu không thành công', 'Thất bại');
            }
        });
    }
}
