<?php

namespace App\Http\Middleware;

use Closure;
use Route;

class FilterSearchCondition
{
    protected $betweenFields = ['created_at', 'updated_at'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $action = Route::current()->getActionName();
        $actionArr = explode('@', $action);
        $actionName = $actionArr[1];
        if ($actionName == 'index') {
            $array = $this->convertRequestToMap($request->except('_url','_token','_method'));
            $request->flash();
            $request->merge($array);
        }

        return $next($request);
    }

    /*
    * 把输入转换为搜索用Map
    * @param $inputs : such as title; title-like; title->, title->=, title-<>; title-in, title-between, title-null
    */
    public function convertRequestToMap($inputs)
    {
        $array = [];
        //如果$inputs类似于'title'，则默认将搜索条件定位完全匹配；
        //如果类似于‘title-like’，则切割字符串，拼搜索数组
        foreach ($inputs as $key => $value) {
            if(!isNullOrEmpty($value)) {
                if ($key === 'page') {
                    $array['page'] = $value;
                    continue;
                }

                $key = str_replace('#','.',$key);

                $conditionArr = explode('-', $key);
                if (count($conditionArr) == 1) {
                    $array['where'][] = array($key, '=', $value);
                } elseif (count($conditionArr) == 2) {
                    $array['where'][] = array($conditionArr[0], $conditionArr[1], $value);
                }
            }
        }
        return $array;
    }

    /**
     * format string time to array time
     *
     * @param  mixed $value
     *
     * @return array
     */
    public function formatBetweentField($value)
    {
        $string = str_replace('/', '-', $value);
        $array = explode(' - ', $string);

        return $array;
    }
}
