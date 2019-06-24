<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 22/06/2019
 * Time: 18:34
 */

namespace App\Tentant;


use App\User;

class TenantManeger
{
    private $tenant;

    /**
     * @return User
     */
    public function getTenant(): ?User
    {
        return $this->tenant;
    }

    /**
     * @param User $tenant
     */
    public function setTenant($tenant): void
    {
        $this->tenant = $tenant;
    }

}
