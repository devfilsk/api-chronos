<?php

namespace App\Model\Api;

use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use UuidModels, TenantUsers;

    protected $table = 'materiais';
    protected $fillable = [
        'descricao', 'time', 'data', 'escopo', 'assunto_uuid'
    ];

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_uuid', 'uuid');
    }

    public function createMaterial($request){
        return $this->create($request->all());
    }

    public function updateMaterial($request){
        $this->fill($request->all());
        return $this->save();
    }

    public function deleteMaterial(){
        return $this->delete();
    }
}
