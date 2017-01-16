<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\Request;

class ActivityUpdateForm extends Request
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
            'movie_id' => 'required',
            'description' => 'required',
            'cost' => 'required',
            'upper_limit' => 'required',
            'address' => 'required',
            'show_time' => 'required',
            'deadline' => 'required',
            'is_continue' => 'required',
            'qrcode_image' => 'required_if:is_continue,1',
            'activity_qrcode_image' => 'required_if:is_continue,2',
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
            'movie_id.required' => '电影信息丢失，请重新进入页面',
            'description.required' => '必须输入描述',
            'cost.required' => '必须填写成本价格',
            'upper_limit.required' => '必须输入人数上限',
            'address.required' => '必须输入地址',
            'show_time.required' => '必须选择放映时间',
            'deadline.required' => '必须选择截止日期',
            'is_continue.required' => '必须选择是否有后续活动',
            'qrcode_image.required_if:is_continue,1' => '无后续活动时必须上传放映二维码',
            'activity_qrcode_image.required_if:is_continue,2' => '有后续活动时必须上传活动二维码',
        ];
    }
}
