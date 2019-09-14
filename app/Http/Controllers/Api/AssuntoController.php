<?php

namespace App\Http\Controllers\Api;

use App\Model\Api\Assunto;
use App\Repository\AssuntoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssuntoController extends BaseController
{

    /**
     * AssuntoController constructor.
     * @param AssuntoRepository $repository
     */
    public function __construct(AssuntoRepository $repository)
    {
        $this->repository = $repository;
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function show($id)
    {
        return $this->responseJson($this->repository->show($id));
    }
}
