<?php

namespace App\Model\Api;

use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{

    use UuidModels, TenantUsers;

    protected $table = "disciplinas";

    protected $fillable = [
        'nome', 'descricao', 'cronograma_uuid'
    ];

    public function cronograma()
    {
        return $this->belongsTo(Cronograma::class, 'cronograma_uuid', 'uuid');
    }

    public function assuntos(){
        return $this->hasMany(Assunto::class, 'disciplina_uuid', 'uuid');
    }

    public function createDisciplina($request){
        return $this->create($request->all());
    }

    public function updateDisciplina($request){
        $this->fill($request->all());
        return $this->save();
    }

    public function deleteDisciplina(){
        return $this->delete();
    }

}
