<?php

namespace App\Http\Controllers\Api;

use App\Repository\RevisaoRepository;

class RevisaoController extends BaseController
{

    /**
     * RevisaoController constructor.
     * @param RevisaoRepository $repository
     */
    public function __construct(RevisaoRepository $repository)
    {
        $this->repository = $repository;
    }
}
