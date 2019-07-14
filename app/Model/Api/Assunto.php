<?php

namespace App\Model\Api;

use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assunto extends Model
{

    use UuidModels, TenantUsers, SoftDeletes;

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

    public function createAssunto($request){
        return $this->create($request->all());
    }

    public function updateAssunto($request){
        $this->fill($request->all());
        return $this->save();
    }

    public function deleteAssunto(){
        return $this->delete();
    }

}
