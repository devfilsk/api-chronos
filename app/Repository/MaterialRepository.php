<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 04/08/2019
 * Time: 21:15
 */

namespace App\Repository;


use App\Model\Api\Material;

class MaterialRepository extends BaseRepository
{
//    public $model = Material::class;

    public function model()
    {
        return $this->model = Material::class;
    }
}
