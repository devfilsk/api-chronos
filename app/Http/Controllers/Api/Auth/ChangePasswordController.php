<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Psy\Util\Str;

class ChangePasswordController extends Controller
{
    use ResetsPasswords;

    public function process(ChangePasswordRequest $request)
    {
//        return $this->reset($request);
        return $this->getPasswordResetTableRow($request)->count() > 0 ? $this->changePassword($request) : $this->tokenNotFoundResponse();
    }

    private function getPasswordResetTableRow($request)
    {
       return DB::table('password_resets')
            ->where([
                    'email' => $request->email,
                    'token' => $request->token
                ]);
    }

    private function changePassword($request)
    {
        $user =  User::whereEmail($request->email)->first();
        $user->update(['password' => bcrypt($request->password)]);
        $this->getPasswordResetTableRow($request)->delete();
        return response()->json(['data' => 'Sua senha foi alterada com sucesso.'], \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    private function tokenNotFoundResponse()
    {
        return response()->json(['error' => 'Token ou email incorretos.'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

//    /**
//     * Reset the given user's password.
//     *
//     * @param  ChangePasswordRequest  $request
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
//     */
//    public function reset(ChangePasswordRequest $request)
//    {
//        // Here we will attempt to reset the user's password. If it is successful we
//        // will update the password on an actual user model and persist it to the
//        // database. Otherwise we will parse the error and return the response.
////        dd($this->broker()->sendResetLink(['email' => 'devfilsk@gmail.com', 'password' => 'secret']));
//        $response = $this->broker()->reset(
//            $this->credentials($request), function ($user, $password) {
//            $this->resetPassword($user, $password);
//        }
//        );
//        return $this->credentials($request);
//        // If the password was successfully reset, we will redirect the user back to
//        // the application's home authenticated view. If there is an error we can
//        // redirect them back to where they came from with their error message.
//        return $response == Password::PASSWORD_RESET
//            ? $this->sendResetResponse($request, $response)
//            : $this->sendResetFailedResponse($request, $response);
//    }
//
//    /**
//     * Get the password reset credentials from the request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    protected function credentials(Request $request)
//    {
//        return $request->only(
//            'email', 'password', 'password_confirmation', 'token'
//        );
//    }
//    /**
//     * Reset the given user's password.
//     *
//     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
//     * @param  string  $password
//     * @return void
//     */
//    protected function resetPassword($user, $password)
//    {
//        $user->password = Hash::make($password);
//
//        $user->setRememberToken(Str::random(60));
//
//        $user->save();
//
//        event(new PasswordReset($user));
//
//        $this->guard()->login($user);
//    }
//
//
//    /**
//     * Get the response for a successful password reset.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  string  $response
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
//     */
//    protected function sendResetResponse(Request $request, $response)
//    {
//        return response()->json($this->redirectPath(), trans($response));
//    }
//
//    /**
//     * Get the response for a failed password reset.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  string  $response
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
//     */
//    protected function sendResetFailedResponse(Request $request, $response)
//    {
//        return  response()->json(['email' => trans($response)]);
//    }
//
//    /**
//     * Get the validation rules that apply to the request.
//     *
//     * @return array
//     */
//    public function rules()
//    {
//        return [
//            'token' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|confirmed',
//        ];
//    }


}
