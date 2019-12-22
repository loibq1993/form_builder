<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormBuilderRequest;
use Illuminate\Http\Request;
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

    public function create()
    {
        return view('formbuilder.create');
    }

    public function store(StoreFormBuilderRequest $request)
    {
        $data = $request->only(
            'title',
            'start_date',
            'end_date',
            'status',
            'form_builder'
        );
        $this->formBuilderService->create($data);

        return redirect()->route('index');
    }
}
