<?php

namespace App\Model\Api;

use App\Traits\UuidModels;
use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{
    use UuidModels;

    protected $table = 'revisoes';
    protected $fillable = [
        'data', 'escopo', 'assunto_uuid'
    ];

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_uuid', 'uuid');
    }

}
