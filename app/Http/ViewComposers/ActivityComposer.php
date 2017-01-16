<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class ActivityComposer {
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
            'route'  => route('backend.activity.index'),
            'method' => 'get',
            'class'  => 'form-inline',
            'inputs' => [

                [
                    'type'       => 'text',
                    'name'       => 'info-like',
                    'value'      => old('info-like'),
                    'attributes' => [
                        'placeholder' => '电影名称',
                        'class'       => 'form-control',
                    ],
                ],

                [
                    'type'       => 'select',
                    'name'       => 'activity#status',
                    'value'      => getEnumArray4Composer(config('enumerations.ACTIVITY_STATUS'), '放映状态'),
                    'selected'   => old('activity#status'),
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
                        'onclick'  => 'location="' .route('backend.activity.index') .'"',
                    ],
                ],
            ],

        ];
    }

}
