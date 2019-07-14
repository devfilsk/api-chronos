<?php

namespace App\Model\Api;

use App\Traits\TenantUsers;
use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revisao extends Model
{
    use UuidModels, TenantUsers, SoftDeletes;

    protected $table = 'revisoes';
    protected $fillable = [
        'data', 'escopo', 'assunto_uuid'
    ];

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_uuid', 'uuid');
    }

    public function createRevisao($request){
        return $this->create($request->all());
    }

    public function updateRevisao($request){
        $this->fill($request->all());
        return $this->save();
    }

    public function deleteRevisao(){
        return $this->delete();
    }

}
