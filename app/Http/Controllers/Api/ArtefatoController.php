<?php

namespace App\Http\Controllers\Api;

use App\Repository\ArtefatoRepository;
use Illuminate\Http\Request;

class ArtefatoController extends BaseController
{
    /**
     * ArtefatoController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $type = array_keys($request->all());
        $this->repository = new ArtefatoRepository($type[0]);
    }

    public function store(Request $request){
        return $this->responseJson($this->repository->store($request));
    }

    public function update(Request $request, $id)
    {
        $model = $this->repository->model()->findOrFail($id);
        return $this->responseSuccessJson($this->repository->update($model, $request), $model->fresh());
    }

}
