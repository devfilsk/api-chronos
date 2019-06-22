<?php

namespace App\Model\Api;

use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{

    use UuidModels;

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

}
