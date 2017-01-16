<?php

namespace App\Traits\Repository;

trait BaseRepositoryTrait
{
    public function validate(array $data, $rules = null, $custom = false)
    {
        if ( ! $custom) {
            $rules = $this->rules($rules);
        }

        return $this->validator->make($data, $rules);
    }

    public function create(array $input)
    {
        $model = $this->model;

        return $model::create($input);
    }

    public function batchCreate(array $input) {
        $model = $this->model;
        return $model::insert($input);
    }

    public function saveById($id, array $data)
    {
        $item = self::find($id);
        foreach ($data as $key => $value) {
            $item->$key = $value;
        }

        return $item->save();
    }

    public function find($id, array $columns = ['*'])
    {
        $model = $this->model;

        return $model::find($id, $columns);
    }

    public function updateById($id, array $input)
    {
        $model = $this->model;

        return $model::where('id', $id)->update($input);
    }

    /**
     * author lzy
     * @param array $idArr
     * @param array $input
     */
    public function setByWhere(array $where, array $input) {
        $model = $this->model;

        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $model = $model->where($field, $condition, $val);
            } else {
                $model = $model->where($field, '=', $value);
            }
        }
        return $model->update($input);
    }

    public function all(array $columns = ['*'])
    {
        $model = $this->model;

        return $model::all($columns);
    }

    public function index()
    {
        $model = $this->model;

        if (property_exists($model, 'order')) {
            return $model::orderBy($model::$order, $model::$sort)->get($model::$index);
        }

        return $model::get($model::$index);
    }

    public function count()
    {
        $model = $this->model;

        return $model::where('id', '>=', 1)->count();
    }

    public function paginate($limit, array $columns = ['*'])
    {
        $model = $this->model;

        return $model::paginate($limit, $columns);
    }

    public function getByWhere(array $where, $columns = ['*'])
    {
        $model = $this->model;

        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $model = $model->where($field, $condition, $val);
            } else {
                $model = $model->where($field, '=', $value);
            }
        }

        return $model->get($columns);
    }

    public function getByWhereIn($field, array $value, $columns = ['*'])
    {
        $model = $this->model;

        return $model->whereIn($field, $value)->get($columns);
    }

    public function getByWhereNotIn($field, array $value, $columns = ['*'])
    {
        $model = $this->model;

        return $model->whereIn($field, $value)->get($columns);
    }

    public function paginateWhere($where, $limit, $columns = ['*'], $moreCondition=false)
    {
        $model = $this->model;

        if ( ! empty($where)) {
            foreach ($where as $key => $value) {
                list($field, $condition, $val) = $value;
                switch ($condition) {
                    case '=':
                    case '>':
                    case '>=':
                    case '<':
                    case '<=':
                    case '<>':
                    case '!=':
                        $model = $model->where($field, $condition, $val);
                        break;
                    case 'like':
                        $model = $model->where($field, $condition, '%' .$val .'%');
                        break;
                    case 'in':
                    case 'notIn':
                    case 'between':
                    case 'notBetween':
                    case 'null':
                    case 'notNull':
                        $condition = 'where' . ucfirst($condition);
                        $model = $model->$condition($field, $val);
                        break;
                    default:
                        $model = $model->where($field, '=', $val);
                        break;
                }
            }
        }

        if(!$moreCondition) {
            return $model->paginate($limit, $columns);
        } else {
            return $model;
        }

    }

    public function lists($value, $key)
    {
        $model = $this->model;

        return $model->lists($value, $key);
    }

    public function destroy($id)
    {
        $model = $this->model;

        return $model::destroy($id);
    }
}
