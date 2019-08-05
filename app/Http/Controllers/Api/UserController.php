<?php

namespace App\Http\Controllers\Api;

use App\Repository\UserRepository;

class UserController extends BaseController
{

    /**
     * UserController constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
