<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class DictionaryComposer {
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
            'route'  => route(''),
            'method' => 'get',
            'class'  => 'form-inline',
            'inputs' => [

                [
                    'type'       => '',
                    'name'       => '',
                    'value'      => old(''),
                    'attributes' => [
                        'placeholder' => '',
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
                        'onclick'  => 'location="' .route('backend.customer.index') .'"',
                    ],
                ],
            ],

        ];
    }

}
