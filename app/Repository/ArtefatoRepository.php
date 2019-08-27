<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 25/08/2019
 * Time: 11:45
 */

namespace App\Repository;


use App\Model\Api\Exercicio;
use App\Model\Api\Material;
use App\Model\Api\Revisao;

class ArtefatoRepository extends BaseRepository
{
    private $type;

    /**
     * ArtefatoRepository constructor.
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function model()
    {
        switch ($this->type){
            case 0: // Material
                return $this->model = Material::class;
            case 1: // Revisao
                return $this->model = Revisao::class;
            case 2: // Exercicio
                return $this->model = Exercicio::class;
        }
    }
}
