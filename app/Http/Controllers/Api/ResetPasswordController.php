<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPasswordMail;
use App\Notifications\ResetPasswordNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends Controller
{
    public $email;
    public $origin;
    public function sendEmail(Request $request) {
        if(!$this->validateEmail($request->email)){
            return $this->failedResponse();
        }
        $this->origin = $request->header('origin');
//        return response()->json($this->origin);
        $this->send($request->email);

        return $this->successResponse();
    }

    /**
     * @param $email
     */
    public function send($email){
        $this->email = $email;
        $token = $this->createToken();
        Mail::to($email)->send(new ResetPasswordMail($token, $this->origin));
    }

    public function createToken()
    {
        $oldToken = DB::table('password_resets')->where('email', $this->email)->first();
        if($oldToken){
            return $oldToken->token;
        }
        $token = Str::random(60);
        $response = $this->saveToken($token);
        return $response;
    }

    public function saveToken($token)
    {
        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        return $token;
    }

    public function validateEmail($email){
        return !!User::where('email', $email)->first();
    }

    public function failedResponse(){
        return response()->json([
            "error" => 'Email não encontrado na nossa base de dados.'
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse(){
        return response()->json([
            "success" => 'Email enviado com sucesso. Por favor, verifique sua caixa de entrada.'
        ], Response::HTTP_OK);
    }
}
