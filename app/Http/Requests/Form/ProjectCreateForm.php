<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class ProjectCreateForm extends Request
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
            'project_name' => 'required',
            'begin_time' => 'required',
            'end_time' => 'required',
            'head_url' => 'required',
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
            'project_name.required' => '项目名称不能为空',
            'begin_time.required' => '开始时间不能为空',
            'end_time.required' => '结束时间不能为空',
            'head_url.required' => '网址不能为空',
        ];
    }
}
