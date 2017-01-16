<?php

namespace App\Repositories;

/**
 * Movie Model Repository
 */
class MovieRepository extends CommonRepository {

    public function findMovieById($id) {
        $model = $this->model;
        $info = $model
            ->where('douban_id', $id)
            ->first();
        return $info;
    }

    public function changeStatusById($id,$status) {
        $map[] = ['douban_id','=',$id];
        $data['status'] = $status;
        return $this->setByWhere($map,$data);
    }

    public function findListByPage($pageNum) {

        $model = $this->model;
        $list = $model
            ->orderBy('like_count', 'desc')
            ->forPage($pageNum, 10)
            ->get();
        return $list;
    }

}
