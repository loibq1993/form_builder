<?php

namespace App\Http\Controllers;

use App\Services\FormBuilderService;

class FormBuilderController extends Controller
{
    protected $formBuilderService;

    public function __construct(FormBuilderService $formBuilderService)
    {
        $this->formBuilderService = $formBuilderService;
    }

    public function index()
    {
        $data = $this->formBuilderService->findWhere(['status' => true])->paginate(10);

        return view('formbuilder.index', compact('data'));
    }

}
