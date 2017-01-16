<?php

namespace App\Repositories;

/**
 * Suggestions Model Repository
 */
class SuggestionsRepository extends CommonRepository {

    public function paginateWhere($where, $limit, $columns = ['*'], $moreCondition=true) {
        $model = parent::paginateWhere($where, $limit, $columns = ['*'], $moreCondition);

        $columns = ['suggestions.*', 'c.nickname'];
        return $model
            ->leftJoin('customer as c', 'suggestions.customer_id', '=', 'c.customer_id')
            ->orderBy('suggestions.created_at', 'desc')
            ->paginate($limit, $columns);

    }

}
