<?php

namespace App\Services;

use App\Repositories\FormBuilderRepository\FormBuilderRepositoryInterface;

/**
 * Class FormBuilderService
 *
 * @package App\Services
 */
class FormBuilderService
{

    protected $repository;

    public function __construct(
        FormBuilderRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function update($surveyID, $data)
    {
        return $this->repository->update($surveyID, $data);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }

    /**
     * Find by id
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function findWhere(array $where, bool $getFirst = false)
    {
        return $this->repository->findWhere($where, $getFirst);
    }
}
