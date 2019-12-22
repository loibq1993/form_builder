<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id, array $relationships = []);

    /**
     * Create
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     *
     * @param       $id
     * @param array $attributes
     *
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * Get data with paginate
     *
     * @param int|NULL $perPage
     * @param bool     $orderBy
     * @param array    $column
     *
     * @return mixed
     */
    public function getPaginate(int $perPage = null, bool $orderBy = true, array $column = ['*']);

    /**
     * Find where condition
     *
     * @param array $where
     * @param bool  $getFirst
     *
     * @return mixed
     */
    public function findWhere(array $where, bool $getFirst = false);

}
