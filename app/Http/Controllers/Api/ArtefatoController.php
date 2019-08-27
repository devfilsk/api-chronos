<?php

namespace App\Http\Controllers\Api;

use App\Repository\ArtefatoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtefatoController extends BaseController
{
    /**
     * ArtefatoController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->repository = new ArtefatoRepository(array_keys($request->all()));
        dd(class_basename($this->repository->model));
    }

//    public function store(Request $request)
//    {
//        $this->repository = new ArtefatoRepository(array_keys($request->all()));
//        return response()->json(array_keys($request->all()));
//    }

}
