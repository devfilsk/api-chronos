<?php

namespace App\Model\Api;

use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{

    use UuidModels;

    protected $table = 'assuntos';
    protected $fillable = [
        'descricao', 'anotacao', 'disciplina_uuid'
    ];

    public function disciplina(){
        return $this->belongsTo(Disciplina::class, 'disciplina_uuid', 'uuid');
    }

    public function revisoes()
    {
        return $this->hasMany(Revisao::class, 'assunto_uuid', 'uuid');
    }

    public function materiais()
    {
        return $this->hasMany(Material::class, 'assunto_uuid', 'uuid');
    }

    public function exercicios()
    {
        return $this->hasMany(Exercicio::class, 'assunto_uuid', 'uuid');
    }

}
