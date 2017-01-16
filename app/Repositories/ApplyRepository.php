<?php

namespace App\Repositories;
use App\Facades\CustomerRepository as CustomerFacade;
use Request;


/**
 * Apply Model Repository
 */
class ApplyRepository extends CommonRepository {

    public function getProcessingByCustomerId($customerId) {

        $map["customer_id"] = $customerId;
        $map["status"] = ""; //todo

        $model = $this->model;
        $info = $model
            ->where($map)
            ->first();
        return $info;

    }

    public function getApplyList($customerId) {

        $model = $this->model;
        $list = $model
            ->where("customer_id", $customerId)
            ->orderBy('status', 'asc')
            ->get();
        return $list;

    }

    public function getApplyCount($customerId) {

        $model = $this->model;
        $list = $model
            ->where("customer_id", $customerId)
            ->count();
        return $list;

    }

    public function paginateWhere($where, $limit, $columns = ['*'], $moreCondition=true) {



        $columns = ['apply.*', 'c.nickname', 'c.sex', 'c.mobile', 'c.score'];

        if(Request::input('apply#status') == '-1') {

            $model = $this->model;

            if(Request::has('c#nickname-like')) {
                $model = $model->where('c.nickname','like','%'.Request::input('c#nickname-like').'%');
            }

            if(Request::has('c#mobile-like')) {
                $model = $model->where('c.mobile','like','%'.Request::input('c#mobile-like').'%');
            }

            $list = $model
                ->leftJoin('customer as c', 'apply.customer_id', '=', 'c.customer_id')
                ->paginate($limit, $columns);


        } else if(Request::input('apply#status') == '0') {
            $model = parent::paginateWhere($where, $limit, $columns = ['*'], $moreCondition);

            $list = $model
                ->leftJoin('customer as c', 'apply.customer_id', '=', 'c.customer_id')
                ->where('status','=',0)
                ->paginate($limit, $columns);
        } else {
            $model = parent::paginateWhere($where, $limit, $columns = ['*'], $moreCondition);

            $list = $model
                ->leftJoin('customer as c', 'apply.customer_id', '=', 'c.customer_id')
                ->paginate($limit, $columns);
        }

        return $list;
    }

}
