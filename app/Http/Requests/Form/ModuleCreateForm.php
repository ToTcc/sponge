<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class ModuleCreateForm extends Request
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
            'project_id' => 'required',
            'module_name' => 'required',
            'description' => 'required',
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
            'project_id.required' => '项目编号不能为空',
            'module_name.required' => '模块名称不能为空',
            'description.required' => '描述不能为空',
        ];
    }
}
