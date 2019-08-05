<?php

namespace App\Http\Controllers\Api;

use App\Repository\MaterialRepository;

class MaterialController extends BaseController
{

    /**
     * MaterialController constructor.
     * @param MaterialRepository $repository
     */
    public function __construct(MaterialRepository $repository)
    {
        $this->repository = $repository;
    }
}
