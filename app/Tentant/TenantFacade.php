<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 22/06/2019
 * Time: 18:50
 */

namespace App\Tentant;


use Illuminate\Support\Facades\Facade;

class TenantFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TenantManeger::class;
    }
}
