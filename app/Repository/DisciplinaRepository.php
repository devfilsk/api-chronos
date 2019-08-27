<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 04/08/2019
 * Time: 20:16
 */

namespace App\Repository;


use App\Model\Api\Disciplina;

class DisciplinaRepository extends BaseRepository
{
//    public $model = Disciplina::class;

    public function model()
    {
        return $this->model = Disciplina::class;
    }
}
