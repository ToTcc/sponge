<?php

namespace App\Repositories;
use DB;
/**
 * MovieLike Model Repository
 */
class MovieLikeRepository extends CommonRepository {

    public function findByMovieId($id) {

        $sql = "SELECT c.*,IF(a.status = 1 OR a.status IS NULL OR a.status = 3, 0, 1) AS is_join FROM (
                SELECT c.customer_id,c.nickname,c.headimgurl, ml.created_at
                FROM v_movie_like ml
                LEFT JOIN v_customer c ON c.customer_id = ml.customer_id
                WHERE ml.movie_id = $id) c
                LEFT JOIN (
                SELECT aj.status,aj.customer_id FROM v_activity a
                LEFT JOIN v_activity_join aj ON aj.activity_id = a.activity_id
                WHERE a.movie_id = $id AND a.status = 1
                ) a ON a.customer_id = c.customer_id
                ORDER BY c.created_at DESC";

        $list = DB::select($sql);

        return object2array($list);

    }

    public function findAllByMovieId($movieId) {

        $sql = "SELECT c.customer_id,c.nickname,c.headimgurl
                FROM v_movie_like ml
                LEFT JOIN v_customer c ON c.customer_id = ml.customer_id
                WHERE ml.movie_id = $movieId ORDER BY ml.created_at DESC";

        $list = DB::select($sql);

        return object2array($list);

    }

    public function findByMovieIdAndCustomerId($movieId, $customerId) {
        $map[] = ["movie_id", "=", $movieId];
        $map[] = ["customer_id", "=", $customerId];
        $info = $this->getByWhere($map)
            ->first();
        return $info;
    }

    public function findLikeMovieList($customerId, $pageNum) {

        $model = $this->model;
        $list = $model->leftJoin('movie as m', 'm.douban_id', '=', 'movie_like.movie_id')
            ->where('movie_like.customer_id', $customerId)
            ->orderBy('movie_like.created_at', 'desc')
            ->forPage($pageNum, 10)
            ->get(['m.*']);
        return $list;
    }

    public function getLikeMovieCount($customerId) {
        $map[] = ["customer_id", "=", $customerId];
        $count = $this->getByWhere($map)
            ->count();
        return $count;
    }

    public function getByCustomerId($customerId) {
        $map['movie_like.customer_id'] = $customerId;
        $list = $this->model
            ->leftJoin('movie as m','movie_like.movie_id','=','m.douban_id')
            ->where($map)
            ->get(['movie_like.like_id', 'movie_like.created_at', 'm.info', 'm.status']);

        foreach($list as &$item) {
            $item['title'] = unserialize($item['info'])['title'];
            $item['link'] = unserialize($item['info'])['alt'];
        }

        return $list;
    }

    public function getCustomerListByMovieId($movieId) {
        $map['movie_like.movie_id'] = $movieId;
        $list = $this->model
            ->leftJoin('customer as c','movie_like.customer_id','=','c.customer_id')
            ->where($map)
            ->get(['movie_like.like_id','movie_like.created_at','c.nickname','c.sex','c.mobile']);

        return $list;
    }

}
