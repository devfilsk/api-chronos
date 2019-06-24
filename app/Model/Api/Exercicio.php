<?php

namespace App\Model\Api;

use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use UuidModels, TenantUsers;

    protected $table = 'exercicios';
    protected $fillable = [
        'descricao', 'quantidade', 'acertos', 'data', 'escopo', 'assunto_uuid'
    ];

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_uuid', 'uuid');
    }

    public function createExercicio($request){
        return $this->create($request->all());
    }

    public function updateExercicio($request){
        $this->fill($request->all());
        return $this->save();
    }

    public function deleteExercicio(){
        return $this->delete();
    }

}
