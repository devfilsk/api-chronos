<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 22/06/2019
 * Time: 16:55
 */

namespace App\Traits;

use App\Tentant\TenantScope;
use function foo\func;

trait TenantUsers
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TenantScope());

        static::creating(function ($model){
            $user = \Tenant::getTenant();
            if($user){
                $model->user_uuid = $user->uuid;
            }
        });

    }

}
