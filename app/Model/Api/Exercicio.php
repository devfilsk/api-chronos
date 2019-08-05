<?php

namespace App\Model\Api;

use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercicio extends Model
{
    use UuidModels, TenantUsers, SoftDeletes;

    protected $table = 'exercicios';
    protected $fillable = [
        'descricao', 'quantidade', 'acertos', 'data', 'escopo', 'assunto_uuid'
    ];

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_uuid', 'uuid');
    }
}
