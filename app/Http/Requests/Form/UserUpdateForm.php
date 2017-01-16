<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class UserUpdateForm extends Request
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
            'email'    => 'required',
            'password' => 'confirmed',
            'role_id'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => '用户名或邮箱不能为空',
            'password.confirmed' => '确认密码不一致',
            'role_id.required'   => '用户角色不能为空',
        ];
    }
}
