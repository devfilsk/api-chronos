<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 04/08/2019
 * Time: 13:29
 */

namespace App\Repository;


use App\Model\Api\Cronograma;

class CronogramaRepository extends BaseRepository
{
//    public $model = Cronograma::class;

    public function model()
    {
        return $this->model = Cronograma::class;
    }
}
