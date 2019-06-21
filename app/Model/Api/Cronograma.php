<?php

namespace App\Model\Api;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    protected $table = 'cronogramas';
    protected $fillable = [
        'uuid'
    ];
}
