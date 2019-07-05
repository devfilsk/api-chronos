<?php

namespace App\Model\Api;

use App\Tentant\TenantScope;
use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use UuidModels, TenantUsers;

    protected $table = 'cronogramas';
    protected $fillable = [
        'uuid', 'titulo', 'descricao', 'inicio', 'fim', 'synced', 'user_uuid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class, 'cronograma_uuid', 'uuid');
    }

    public function createCronograma($request)
    {
        return $this->create($request->all());
    }

    public function updateCronograma($request)
    {
        $this->fill($request->all());
        return $this->save();

    }

    public function deleteCronograma(){
        return $this->delete();
    }

    public function cronogramasAndRelations(){
        return Cronograma::with([
            'disciplinas',
            'disciplinas.assuntos',
            'disciplinas.assuntos.materiais',
            'disciplinas.assuntos.revisoes',
            'disciplinas.assuntos.exercicios'
        ])->get();
    }

    public function cronogramaAndRelations($id){
        return Cronograma::with([
            'disciplinas',
            'disciplinas.assuntos',
            'disciplinas.assuntos.materiais',
            'disciplinas.assuntos.revisoes',
            'disciplinas.assuntos.exercicios'
        ])->where('uuid', $id)->get();
    }

}
