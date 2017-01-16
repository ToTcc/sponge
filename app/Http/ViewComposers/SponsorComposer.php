<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class SponsorComposer {
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
            'route'  => route('backend.sponsor.index'),
            'method' => 'get',
            'class'  => 'form-inline',
            'inputs' => [

                [
                    'type'       => 'text',
                    'name'       => 'nickname-like',
                    'value'      => old('nickname-like'),
                    'attributes' => [
                        'placeholder' => '用户名称',
                        'class'       => 'form-control',
                    ],
                ],

                [
                    'type'       => 'text',
                    'name'       => 'mobile-like',
                    'value'      => old('mobile-like'),
                    'attributes' => [
                        'placeholder' => '手机号码',
                        'class'       => 'form-control',
                    ],
                ],

                [
                    'type'       => 'select',
                    'name'       => 'available',
                    'value'      => ['发起人状态','正常','黑名单'],
                    'selected'   => old('available'),
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
                        'onclick'  => 'location="' .route('backend.sponsor.index') .'"',
                    ],
                ],

            ],

        ];
    }

}
