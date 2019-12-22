<?php

namespace App\Repositories;

/**
 * Class EloquentRepository
 * @package App\Repositories
 */
abstract class EloquentRepository implements RepositoryInterface
{
    const PER_PAGE_DEFAULT = 10;
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get one
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id, array $relationships = [])
    {
        $result = $this->model->with($relationships)->find($id);

        return $result;
    }

    /**
     * Create
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     *
     * @param       $id
     * @param array $attributes
     *
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }
        return false;
    }

    /**
     * Delete
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * Get data with paginate
     *
     * @param int|NULL $perPage
     * @param bool     $orderBy
     * @param array    $column
     *
     * @return mixed
     */
    public function getPaginate(int $perPage = null, bool $orderBy = true, array $column = ['*'])
    {
        $query = $this->model;
        if (!empty($column)) {
            $query = $query->select($column);
        }
        if ($orderBy) {
            $query = $query->orderByDESC('id');
        }

        return $query->paginate(!is_null($perPage) ? $perPage : '');
    }

    /**
     * Find where condition
     *
     * @param array $where
     * @param bool  $getFirst
     *
     * @return mixed
     */
    public function findWhere(array $where, bool $getFirst = false)
    {
        return $query = $this->model->where($where);
    }
}
