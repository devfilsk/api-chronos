<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 04/08/2019
 * Time: 13:32
 */

namespace App\Repository;


abstract class BaseRepository
{
    protected $model;
    protected $modelName;

    public function model() {
        return new $this->model;
    }
}
