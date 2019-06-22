<?php

namespace App\Model\Api;

use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use UuidModels;

    protected $table = 'materiais';
    protected $fillable = [
        'descricao', 'time', 'data', 'escopo', 'assunto_uuid'
    ];

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_uuid', 'uuid');
    }
}
