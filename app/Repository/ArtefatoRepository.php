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
use Illuminate\Http\Request;

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
        switch ($this->type){
            case 0: // Material
                $this->model = Material::class;
                break;
            case 1: // Revisao
                $this->model = Revisao::class;
                break;
            case 2: // Exercicio
                $this->model = Exercicio::class;
                break;
        }
    }

    public function store(Request $request)
    {
        return $this->model()->create($request[0]);
    }

    public function update($model, $request)
    {
        $model->fill($request[0]);
        return $model->save();
    }
}
