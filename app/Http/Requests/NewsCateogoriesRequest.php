<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Brian2694\Toastr\Facades\Toastr;

class NewsCateogoriesRequest extends FormRequest
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
        $dataRules = [
            'name' => 'required|max:255|unique:news_categories,name,' . $this->news_category,
            'img' => ['required' => Rule::requiredIf(empty($this->news_category))],
            'seo_name' => 'required|max:255|unique:news_categories,seo_name,' . $this->news_category,
        ];

        return $dataRules;
    }

    public function messages() 
    {
        return [
            'name.required' => 'Tiêu đề không được để trống',
            'name.unique' => 'Tiêu đề đã tồn tại',
            'name.max' => 'Tiêu đề không được quá 255 kí tự',
            'img.required' => 'Vui lòng thêm hình ảnh',
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
