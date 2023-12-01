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
            'name' => 'required|max:255|unique:news_categories,name,' . $this->news_categories,
            'img' => ['required' => Rule::requiredIf(empty($this->news_categories))],
            'seo_name' => 'required|max:255|unique:news_categories,seo_name,' . $this->news_categories,
        ];

        return $dataRules;
    }

    public function message() 
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'name.max' => 'Tên không được quá 255 kí tự',
            'img.required' => 'Vui lòng thêm hình ảnh',
            'seo_name.required' => 'Vui lòng điền seo name',
            'seo_name.unique' => 'Seo name đã tồn tại',
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
