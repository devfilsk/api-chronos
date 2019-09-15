<?php

namespace App\Http\Controllers\Api;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            return $this->repository->createUser($request);
        }catch (\Exception $e){
            return response()->json(["msg" => "Ops. Ocorreu um erro interno."], 500);
        }
    }

}
