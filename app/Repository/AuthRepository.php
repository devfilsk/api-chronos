<?php
/**
 * Created by PhpStorm.
 * User: Filipe Maciel
 * Date: 18/08/2019
 * Time: 16:52
 */

namespace App\Repository;

use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;

class AuthRepository extends BaseRepository
{
    use SendsPasswordResetEmails, ResetsPasswords;

//    public $model = User::class;

    public function model()
    {
        return $this->model = User::class;
    }

}
