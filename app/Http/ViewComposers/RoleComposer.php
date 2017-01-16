<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class RoleComposer
{
    /**
     * 将数据绑定到视图
     *
     * @param  View $view
     *
     * @return mixed
     */
    public function compose(View $view)
    {
        $handle = self::gethandle();
        $search = self::getSearchInputs();
        $view->with(compact('handle', 'search'));
    }

    private static function gethandle()
    {
        return [
            [
                'icon'  => 'plus',
                'title' => '新增',
                'class' => 'success',
                'route' => 'backend.role.create',
            ],
        ];
    }

    private static function getSearchInputs()
        {
            return [
                'route'  => route('backend.role.index'),
                'method' => 'get',
                'class'  => 'form-inline',
                'inputs' => [

                    [
                        'type'       => 'text',
                        'name'       => 'name-like',
                        'value'      => old('name-like'),
                        'attributes' => [
                            'placeholder' => '角色名称',
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
                        'value'      => '<i class="fa fa-refresh"></i> 重置',
                        'attributes' => [
                            'class' => 'btn btn-primary btn-sm',
                            'type'  => 'button',
                            'style' => 'margin-bottom:0',
                            'onclick'  => 'location="' .route('backend.role.index') .'"',
                        ],
                    ],

                ],


            ];
        }
}
