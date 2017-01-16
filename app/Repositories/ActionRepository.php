<?php

namespace App\Repositories;
use App\Facades\MenuRepository as MenuFacades;
/**
 * Action Model Repository
 */
class ActionRepository extends CommonRepository
{
    public function getActionsByRoutes($routes)
    {
        $data = [];
        $menus = MenuFacades::lists('route', 'id')->toArray();
        $actions = $this->getAllActions()->toArray();

        foreach ($routes as $route) {
            /* 排除无须验证操作 */
            if (in_array($route->getActionName(), config('cowcat.without-verification-actions'))) {
                continue;
            }

            /* 排除菜单 */
            if (array_key_exists('as', $route->getAction())) {
                if (in_array($route->getAction()['as'], $menus)) {
                    continue;
                }
            };

            /* 排除已存在的操作 */
            if (in_array($route->getActionName(), $actions)) {
                continue;
            }

            $data[] = $route->getActionName();
        }

        return array_unique($data);
    }

    public function getAllActions()
    {
        return $this->model->lists('action', 'id');
    }

    /**
     * 查看操作是否存在
     *
     * @param $user
     *
     * @return array|mixed
     */
    public function checkActionExist($action)
    {
        $where['action'] = $action;
        $list = self::getByWhere($where)->toArray();

        if(!isNullOrEmpty($list)) {
            return true;
        } else {
            return false;
        }
    }
}
