<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Brian2694\Toastr\Facades\Toastr;

class ServerLinksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $dataRules = [
            'name' => 'required|max:255|unique:server_links,name,'.$this->server_link,
            'seo_name' => 'required|max:255|unique:server_links,seo_name,'.$this->server_link,
        ];

        return $dataRules;
    }

    public function messages() 
    {
        return [
            'name.required' => 'Tiêu đề không được để trống',
            'name.unique' => 'Tiêu đề đã tồn tại',
            'name.max' => 'Tiêu đề không được quá 255 kí tự',
            'seo_name.required' => 'Vui lòng điền đường dẫn',
            'seo_name.unique' => 'Đường dẫn đã tồn tại',
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
