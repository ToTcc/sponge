<?php

namespace App\Traits\Presenter;

use Form;
use Html;

trait BasePresenterTrait
{

    /**
     * render action links
     *
     * @param $action
     *
     * @return string
     */
    public function renderLinks($action)
    {
        $links = '<div class="row"><div class="col-md-12">';
        $array = array_map(function ($item) {
            return Html::decode(Html::link($item['url'], $item['title'], $item['attr']));
        }, $action);
        $links .= implode(' ', $array);
        $links .= '</div></div>';
        
        return $links;
    }


    /**
     * render search form
     *
     * @param $form
     *
     * @return string
     */
    public function renderSearchForm($form)
    {
        $search = '<div class="table-responsive"><div class="col-md-12">';
        $search .= Form::open(['url' => $form['route'], 'method' => $form['method'], 'class' => $form['class']]);
        $array = array_map(function ($input) {
            return $this->buildInputByType($input);
        }, $form['inputs']);
        $search .= implode(" ", $array);
        $search .= Form::close();
        $search .= '</div></div>';

        return $search;
    }


    /**
     * build input by input type
     *
     * @param $input
     *
     * @return mixed
     */
    public function buildInputByType($input)
    {
        $type = $input['type'];
        if ($type == 'text') {
            $input = Form::$type($input['name'], $input['value'], $input['attributes']);
        } elseif ($type == 'select') {
            $input = Form::$type($input['name'], $input['value'], $input['selected'], $input['attributes']);
        } elseif ($type == 'button') {
            $input = Form::$type($input['value'], $input['attributes']);
        }

        return $input;
    }

    /**
     * render pagination
     *
     * @param $form
     *
     * @return string
     */
    public function renderPagination($data, $form = null) {
        if(!isNullOrEmpty($form)) {
            foreach ($form['inputs'] as $item) {
                if($item['type'] != 'button') {
                    if($item['type'] == 'select') {
                        $page[$item['name']] = $item['selected'];
                    } else {
                        $page[$item['name']] = $item['value'];
                    }
                }
            }
            $result = $data->appends($page)->render();
        } else {
            $result = $data->render();
        }

        return $result;
    }

}
