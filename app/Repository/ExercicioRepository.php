<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 04/08/2019
 * Time: 20:57
 */

namespace App\Repository;


use App\Model\Api\Exercicio;

class ExercicioRepository extends BaseRepository
{
//    public $model = Exercicio::class;

    public function model()
    {
        return $this->model = Exercicio::class;
    }
}
