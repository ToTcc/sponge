<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class MovieComposer {
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
            'route'  => route('backend.movie.index'),
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
                    'name'       => 'status',
                    'value'      => getEnumArray4Composer(config('enumerations.MOVIE_STATUS'), '电影状态'),
                    'selected'   => old('status'),
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
                        'onclick'  => 'location="' .route('backend.movie.index') .'"',
                    ],
                ],
            ],

        ];
    }

}
