<?php

namespace App\Libraries;

use App\Constants\ResponseCodesConstants;
use App\Model\User;
use App\Traits\LoginAttemptsTrait;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Log\LoggerInterface;

class LoginLibrary
{
    use LoginAttemptsTrait;

    protected $log;

    public function __construct(LoggerInterface $logger){
        $this->log = $logger;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try{
            $email = $request->input('email');
            $this->log->info($email);

            $this->checkLoginAttempt($email);

            if (!Auth::attempt(['email' => request('email'), 'password' => request('password'), 'status' => 1])) {
                return response()->json(['status' => false, 'message' => ResponseCodesConstants::UNAUTHORISED['message']], ResponseCodesConstants::UNAUTHORISED['code']);
            }

            $userAuth = Auth::user();

            $user = User::with('moneyCash')->with('systemRole')->find($userAuth->id)->toArray();



            $objToken = $userAuth->createToken(request('email'));

            $expiration = $objToken->token->expires_at;

            $this->clearLoginAttempts($email);

            return response()->json(
                [
                    'message' => "Bienvenido $userAuth->name $userAuth->last_name",
                    "status" => true,
                    "userData" => $user,
                    "token" => $objToken->accessToken,
                    "expiration_token" => $expiration,
                ]
                , ResponseCodesConstants::SUCCESS['code']);
        } catch (AuthorizationException $e) {
            $this->log->error(__CLASS__." ".__FUNCTION__." Exception ".$e->getMessage()." ".$e->getTraceAsString());
            return response()->json(['status' => false, 'message' => ResponseCodesConstants::UNAUTHORISED['message']], ResponseCodesConstants::UNAUTHORISED['code']);
        } catch(Exception $e){
            $this->log->error(__CLASS__." ".__FUNCTION__." Exception ".$e->getMessage()." ".$e->getTraceAsString());

            $code =  ResponseCodesConstants::INTERNAL_ERROR['code'];
            return response()->json(['status' => false, 'message' => $e->getMessage()], $code);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try{
            if (Auth::check()) {
                Auth::user()->AauthAcessToken()->delete();
            }

            return response()->json(["status" => true, "message" => "Sesión finalizada"]);
        }catch(Exception $e){
            $this->log->error(__CLASS__." ".__FUNCTION__." Exception ".$e->getMessage()." ".$e->getTraceAsString());
            return response()->json(['status' => false, 'message' => ResponseCodesConstants::INTERNAL_ERROR['message']], ResponseCodesConstants::INTERNAL_ERROR['code']);
        }
    }
}
