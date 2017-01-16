<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class ApplyComposer {
    /**
     * 将数据绑定到视图
     *
     * @param  View $view
     *
     * @return mixed
     */
    public function compose(View $view) {
        $search = self::getSearchInputs();
        $view->with(compact('search'));
    }

    private static function getSearchInputs() {
        return [
            'route'  => route('backend.apply.index'),
            'method' => 'get',
            'class'  => 'form-inline',
            'inputs' => [

                [
                    'type'       => 'text',
                    'name'       => 'c#nickname-like',
                    'value'      => old('c#nickname-like'),
                    'attributes' => [
                        'placeholder' => '用户名称',
                        'class'       => 'form-control',
                    ],
                ],

                [
                    'type'       => 'text',
                    'name'       => 'c#mobile-like',
                    'value'      => old('c#mobile-like'),
                    'attributes' => [
                        'placeholder' => '手机号码',
                        'class'       => 'form-control',
                    ],
                ],

                [
                    'type'       => 'select',
                    'name'       => 'apply#status',
                    'value'      => [-1 => '审核状态', 0 => '审核中', 1 => '已批注', 2 => '已拒绝'],
                    'selected'   => old('apply#status'),
                    'attributes' => [
                        'class'       => 'form-control select2',
                    ],
                ],

                [
                    'type'       => 'button',
                    'value'      => '<i class="fa fa-filter"></i> 筛选',
                    'attributes' => [
                        'class' => 'btn btn-success btn-sm',
                        'type'  => 'submit',
                        'style' => 'margin-bottom:0',
                    ],
                ],

                [
                    'type'       => 'button',
                    'value'      => '<i class="fa fa-filter"></i> 重置',
                    'attributes' => [
                        'class' => 'btn btn-primary btn-sm',
                        'type'  => 'button',
                        'style' => 'margin-bottom:0',
                        'onclick'  => 'location="' .route('backend.apply.index') .'"',
                    ],
                ],
            ],

        ];
    }

}
