<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 20/06/2019
 * Time: 20:21
 */

namespace App\Traits;


use Ramsey\Uuid\Uuid;

trait UuidModels
{

    protected static function bootUuidModels() {
        static::creating(function ($model){
            if(!$model->getKey()){
                $model->{$model->getKeyName()} = (string) Uuid::uuid4();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getKeyName()
    {
        return 'uuid';
    }

}
