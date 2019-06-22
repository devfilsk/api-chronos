<?php

namespace App\Model\Api;

use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use UuidModels;

    protected $table = 'exercicios';
    protected $fillable = [
        'descricao', 'quantidade', 'acertos', 'data', 'escopo', 'assunto_uuid'
    ];

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_uuid', 'uuid');
    }
}
