<?php

namespace App\Http\Controllers\Api;

use App\Repository\DisciplinaRepository;

class DisciplinaController extends BaseController
{
    /**
     * DisciplinaController constructor.
     * @param DisciplinaRepository $repository
     */
    public function __construct(DisciplinaRepository $repository)
    {
        $this->repository = $repository;
    }
}
