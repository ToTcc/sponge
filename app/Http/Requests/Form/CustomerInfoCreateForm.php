<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class CustomerInfoCreateForm extends Request
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
            'sex' => 'required',
            'height_type' => 'required',
            'birthday' => 'required',
            'birth_province' => 'required',
            'birth_city' => 'required',
            'birth_district' => 'required',
            'school' => 'required',
            'major_type' => 'required',
            'work_status' => 'required',
            'career_type' => 'required',
            'position_type' => 'required',
            'income_type' => 'required',
            'advantage_type' => 'required',
            'degree_type' => 'required',
            'constellation_type' => 'required',
            'blood_type' => 'required',
            'weight_type' => 'required',
            'nationality_type' => 'required',
            'marriage_status' => 'required',
            'work_expect_province' => 'required',
            'work_expect_city' => 'required',
            'family_type' => 'required',
            'city_level' => 'required',
            'father_career' => 'required',
            'mother_career' => 'required',
            'birth_status' => 'required',
            'relative_count' => 'required',
            'emotional_experience' => 'required',
            'long_distance_status' => 'required',
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
            'sex.required' => '必须填写性别',
            'height_type.required' => '必须填写身高',
            'birthday.required' => '必须填写出生年份',
            'birth_province.required' => '必须填写出生省份',
            'birth_city.required' => '必须填写出生城市',
            'birth_district.required' => '必须填写出生区',
            'school.required' => '必须填写学校',
            'major_type.required' => '必须填写专业',
            'work_status.required' => '必须填写工作状态',
            'career_type.required' => '必须填写职业',
            'position_type.required' => '必须填写职位',
            'income_type.required' => '必须填写年收入',
            'advantage_type.required' => '必须填写优势',
            'degree_type.required' => '必须填写学历',
            'constellation_type.required' => '必须填写星座',
            'blood_type.required' => '必须填写血型',
            'weight_type.required' => '必须填写体重',
            'nationality_type.required' => '必须填写民族',
            'marriage_status.required' => '必须填写婚姻状况',
            'work_expect_province.required' => '必须填写期望发展省份',
            'work_expect_city.required' => '必须填写期望发展城市',
            'family_type.required' => '必须填写家庭类型',
            'city_level.required' => '必须填写城市等级',
            'father_career.required' => '必须填写父亲职业',
            'mother_career.required' => '必须填写母亲职业',
            'birth_status.required' => '必须填写生育状况',
            'relative_count.required' => '必须填写兄妹数量',
            'emotional_experience.required' => '必须填写感情经历',
            'long_distance_status.required' => '必须填写是否接受异地恋',
        ];
    }
}
