<?php

namespace App\Repositories\FormBuilderRepository;

use App\Models\FormBuilder;
use App\Repositories\EloquentRepository;

/**
 * Class FormBuilderEloquentRepository
 *
 */

class FormBuilderEloquentRepository extends EloquentRepository implements FormBuilderRepositoryInterface
{
    public function getModel()
    {
        return FormBuilder::class;
    }
}
