<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
        $user = $this->route('user');
        return [
        'name'=>'required',
        'role'=>'required',
        'phone'=>'required',
        'class'=>'required',
        'coin'=>'required',
        'user_name'=>'required|min:5|max:255|unique:Users,user_name,'.$user->id,
        'email'=>'required|unique:Users,email,'.$user->id,
        'status'=>'required',
        'local'=>'required',
        'code'=>'required',
        ];
    }
    public function messages(){
        return [
        'name.required'=>'Trường này không được để trống',
        'role.required'=>'Trường này không được để trống',
        'phone.required'=>'Trường này không được để trống',
        'class.required'=>'Trường này không được để trống',
        'coin.required'=>'Trường này không được để trống',
        'user_name.required'=>'Trường này không được để trống',
        'email.required'=>'Trường này không được để trống',
        'password.required'=>'Trường này không được để trống',
        'password_confirmation.required'=>'Trường này không được để trống',
        'user_name.unique'=>'Tên người dùng đã tồn tại',
        'user_name.min'=>'Tên người dùng phải từ 5 ký tự',
        'user_name.max'=>'Tên người dùng vượt quá ký tự cho phép',
        'email.required'=>'Vui lòng nhập email',
        'email.unique'=>'Email đã tồn tại',
        'status.required'=>'Vui lòng chọn trạng thái',
        'local.required'=>'Trường này không được để trống',
        'code.required'=>'Trường này không được để trống',
        ];
    }
}
