<?php

namespace App\Repositories;
use DB;
/**
 * Activity Model Repository
 */
class ActivityRepository extends CommonRepository {

    public function paginateWhere($where, $limit, $columns = ['*'], $moreCondition=true) {
        $model = parent::paginateWhere($where, $limit, $columns = ['*'], $moreCondition);

        $columns = ['activity.*', 'm.info'];
        return $model
            ->leftJoin('movie as m', 'activity.movie_id', '=', 'm.douban_id')
            ->orderBy('activity.created_at', 'desc')
            ->paginate($limit, $columns);

    }

    public function getTotalMoviePlayCount($movieId) {
        $map[] = ["movie_id", "=", $movieId];
        $map[] = ["status", "=", config("enumerations.ACTIVITY_STATUS.END")];
        $count = $this->getByWhere($map)
            ->count();
        return $count;
    }

    public function findByMovieId($id) {
        $map["movie_id"] = $id;
        $info = $this->model
            ->where($map)
            ->whereNotIn("status", array(
                config("enumerations.ACTIVITY_STATUS.END"),
                config("enumerations.ACTIVITY_STATUS.CANCEL")
            ))
            ->first();
        return $info;

    }

    public function findValidList() {

        $status = config("enumerations.ACTIVITY_STATUS.WAITING_JOIN");

        $sql = "SELECT a.*,m.like_count,m.info
                FROM v_activity a
                LEFT JOIN v_movie m ON m.douban_id = a.movie_id
                WHERE a.status = $status ORDER BY a.show_time asc";

        $list = DB::select($sql);

        return object2array($list);

    }

    public function getCountByMovieId($id,$status) {
        $map['movie_id'] = $id;
        $map['status'] = $status;
        $count = $this->model->where($map)->count();
        return $count;
    }

    public function getWaitingEndList() {

        $list = $this->model
            ->whereIn("status", array(
                config("enumerations.ACTIVITY_STATUS.WAITING_PLAY"),
                config("enumerations.ACTIVITY_STATUS.WAITING_JOIN")
            ))
            ->get();
        return $list;

    }

    public function getListByMovieId($id) {
        $sql = "SELECT a.activity_id, b.join_count, b.refund_count, IFNULL(c.total_money,0) as total_money FROM v_activity a
                LEFT JOIN
                (SELECT join_id, activity_id, 
                IFNULL(COUNT(CASE WHEN status = ".config('enumerations.ACTIVITY_JOIN_STATUS.END_PAY')." THEN join_id ELSE NULL END),0) as join_count,
                IFNULL(COUNT(CASE WHEN status = ".config('enumerations.ACTIVITY_JOIN_STATUS.REFUND')." THEN join_id ELSE NULL END),0) as refund_count
                FROM v_activity_join GROUP BY activity_id) b
                ON a.activity_id = b.activity_id
                LEFT JOIN
                (SELECT aj.join_id, SUM(p.money) AS total_money
                FROM v_activity_join aj 
                LEFT JOIN v_pay p ON aj.pay_id = p.pay_id
                WHERE p.status = ".config('enumerations.PAY_STATUS.END_PAY').") c
                ON b.join_id = c.join_id
                WHERE a.movie_id = ".$id." AND 
                a.status = ".config('enumerations.ACTIVITY_STATUS.END');

        $list = DB::select($sql);

        return object2array($list);
    }

    public function getValidActivityById($id) {
        $item = $this->model
            ->where('movie_id','=',$id)
            ->whereIn('status',[config('enumerations.ACTIVITY_STATUS.WAITING_JOIN'),config('enumerations.ACTIVITY_STATUS.WAITING_PLAY')])
            ->first();

        return $item;
    }

}
