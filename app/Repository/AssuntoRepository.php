<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 04/08/2019
 * Time: 20:50
 */

namespace App\Repository;


use App\Model\Api\Assunto;

class AssuntoRepository extends BaseRepository
{
    public $model = Assunto::class;

//    public function model()
//    {
//        return $this->model = Assunto::class;
//    }

    public function show($id)
    {
        return $this->model()
            ->where('uuid', $id)
            ->with([
                'revisoes',
                'materiais',
                'exercicios'
            ])->get();
    }

}
