<?php

namespace App\Http\ViewComposers;

use App\Facades\MenuRepository;
use Illuminate\Contracts\View\View;

class MenuComposer
{
    /**
     * building data to the view
     *
     * @param  View $view
     *+
     *
     * @return mixed
     */
    public function compose(View $view)
    {
        $form = self::getForm();
        $links = self::getLinks();
        $inputs = self::getSearchInputs();
        $view->with(compact('form', 'links', 'inputs'));
    }

    private static function getForm()
    {
        return [
            'route'  => route('backend.menu.index'),
            'method' => 'get',
            'class'  => 'form-inline',
            'inputs' => [
                [
                    'type'       => 'select',
                    'name'       => 'parent_id',
                    'value'      => MenuRepository::getAllTopMenus(),
                    'selected'   => old('parent_id'),
                    'attributes' => [
                        'class' => 'form-control select2',
                        'style' => 'width:100%',
                    ],
                ],
                [
                    'type'       => 'text',
                    'name'       => 'name',
                    'value'      => old('name'),
                    'attributes' => [
                        'placeholder' => '菜单名称',
                        'class'       => 'form-control',
                    ],
                ],
                [
                    'type'       => 'text',
                    'name'       => 'created_at',
                    'value'      => old('created_at'),
                    'attributes' => [
                        'class' => 'form-control',
                        'id'    => 'created_at',
                    ],
                ],
                [
                    'type'       => 'button',
                    'value'      => '<i class="fa fa-filter"></i> 筛选',
                    'attributes' => [
                        'class' => 'btn btn-success btn-flat',
                        'type'  => 'submit',
                    ],
                ],
            ],
        ];
    }

    private static function getLinks()
    {
        return [
            [
                'url'   => route('backend.menu.create'),
                'attr'  => [
                    'class' => 'btn btn-box btn-success btn-flat',
                ],
                'title' => '<i class="fa fa-plus"></i> 新增',
            ],
        ];
    }

    private static function getSearchInputs()
    {
        return [
            'route'  => route('backend.menu.index'),
            'method' => 'get',
            'class'  => 'form-inline',
            'inputs' => [
                [
                    'type'       => 'select',
                    'name'       => 'parent_id',
                    'value'      => MenuRepository::getAllTopMenus(),
                    'selected'   => old('parent_id'),
                    'attributes' => [
                        'class' => 'form-control select2',
                    ],
                ],
                [
                    'type'       => 'text',
                    'name'       => 'name-like',
                    'value'      => old('name'),
                    'attributes' => [
                        'placeholder' => '菜单名称',
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
                        'onclick'  => 'location="' .route('backend.menu.index') .'"',
                    ],
                ],
            ],
        ];
    }
}
