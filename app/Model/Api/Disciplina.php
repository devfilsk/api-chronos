<?php

namespace App\Model\Api;

use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{

    use UuidModels, TenantUsers, SoftDeletes;

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
