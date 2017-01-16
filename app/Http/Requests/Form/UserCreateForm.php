<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class UserCreateForm extends Request
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
            'email'                 => 'required|unique:users',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
            'role_id'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'                 => '用户名或邮箱不能为空',
            'email.unique'                   => '用户名或邮箱已存在',
            'password.required'              => '用户密码不能为空',
            'password.confirmed'             => '确认密码不一致',
            'password_confirmation.required' => '确认密码不能为空',
            'role_id.required'               => '用户角色不能为空',
        ];
    }
}
