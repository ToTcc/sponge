<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class EventComposer {
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
            'route'  => route('backend.event.index'),
            'method' => 'get',
            'class'  => 'form-inline',
            'inputs' => [

                [
                    'type'       => 'text',
                    'name'       => 'event#title-like',
                    'value'      => old('event#title-like'),
                    'attributes' => [
                        'placeholder' => '活动名称',
                        'class'       => 'form-control',
                    ],
                ],

                [
                    'type'       => 'select',
                    'name'       => 'event#status',
                    'value'      => getEnumArray4Composer(config('enumerations.EVENT_STATUS'), '活动状态'),
                    'selected'   => old('event#status'),
                    'attributes' => [
                        'class'       => 'form-control select2',
                    ],
                ],

                [
                    'type'       => 'text',
                    'name'       => 'c#nickname-like',
                    'value'      => old('c#nickname-like'),
                    'attributes' => [
                        'placeholder' => '用户名',
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
                        'onclick'  => 'location="' .route('backend.event.index') .'"',
                    ],
                ],
            ],

        ];
    }

}
