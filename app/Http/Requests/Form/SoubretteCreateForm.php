<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class SoubretteCreateForm extends Request
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
            'mobile' => 'required|numeric',
            'soubrette_name' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'school' => 'required',
            'experience' => 'required',
            'motto' => 'required',
            'image' => 'required',
        ];
    }

    /**
     * Get the validation message that apply to the request
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mobile.required' => '手机号码不能为空',
            'mobile.numeric' => '手机号码必须为数字',
            'soubrette_name.required' => '姓名不能为空',
            'sex.required' => '性别不能为空',
            'birthday.required' => '出生日期不能为空',
            'school.required' => '学校不能为空',
            'experience.required' => '经验不能为空',
            'motto.required' => '格言不能为空',
            'image.required' => '红娘图片不能为空',
        ];
    }
}
