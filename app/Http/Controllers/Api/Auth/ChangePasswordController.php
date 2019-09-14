<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class ChangePasswordController extends Controller
{
    use ResetsPasswords;

    public function process(Request $request)
    {
        try{
            $passwordsResets = $this->getPasswordResetTableRow($request)->first();
            return isset($passwordsResets) ?
                $this->changePassword($passwordsResets, $request) :
                $this->tokenNotFoundResponse();
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    private function getPasswordResetTableRow($request)
    {
       return DB::table('password_resets')
            ->where([
                'token' => $request->token
            ]);
    }

    private function changePassword($passwordsResets, $request)
    {
        $user =  User::whereEmail($passwordsResets->email)->first();
        $user->update(['password' => bcrypt($request->password)]);
        $this->getPasswordResetTableRow($request)->delete();
        return response()->json(['data' => 'Sua senha foi alterada com sucesso.'], \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    private function tokenNotFoundResponse()
    {
        return response()->json(['error' => 'Token ou email incorretos.'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
