<?php

namespace App\Http\Controllers\Api;

use App\Model\Api\Cronograma;
use App\Repository\CronogramaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CronogramaController extends BaseController
{
    /**
     * CronogramaController constructor.
     * @param $repository
     */
    public function __construct(CronogramaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllWithRelations(){
        $cron = new Cronograma();
        $retorno['cronogramas'] = $cron->cronogramasAndRelations();
        return response()->json($retorno);
    }

    public function showFullCronograma($id){
        $cron = new Cronograma();
        $retorno['cronograma'] = $cron->cronogramaAndRelations($id);
        return response()->json($retorno);
    }

}
