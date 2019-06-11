<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request) {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        $token = \JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    private function responseToken($token){
        return $token ? ['token' => $token] :
            response()->json([
                'error' => \Lang::get('auth.failed')
            ], 400);
    }

    public function logout(){
        \Auth::logout();
        // 204 significa "sem conteúdo | No-content"
        return response()->json([], 204);
    }
}
