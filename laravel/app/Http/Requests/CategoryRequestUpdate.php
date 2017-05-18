<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequestUpdate extends FormRequest
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
        $category = $this->route('category');

        return [
            'super_category_id'=>'required|numeric',
            'title'=>'required|max:191|min:3|unique:Categories,title,'.$category->id,
            'description'=>'required|min:3'
        ];
    }
    public function messages(){
        return [
                'title.required'=>'Trường này không được để trống',
                'title.max'=>'Trường này có độ dài đến 191 ký tự',
                'title.min'=>'Trường này có độ dài từ 3 ký tự',
                'title.unique'=>'Trường này đã tồn tại',
                'super_category_id.required'=>'Trường này không được để trống',
                'description.required'=>'Trường này không được để trống',
                'super_category_id.numeric'=>'Trường này chỉ được nhập số',
                'description.min'=>'Trường này có độ dài từ 3 ký tự'
        ];
    }
}
