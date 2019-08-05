<?php

namespace App\Http\Controllers\Api;


use App\Repository\ExercicioRepository;

class ExercicioController extends BaseController
{
    public function __construct(ExercicioRepository $repository)
    {
        $this->repository = $repository;
    }
}
