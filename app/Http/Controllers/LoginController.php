<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Libraries\LoginLibrary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected  $loginLibrary;

    public function __construct(LoginLibrary $loginLibrary)
    {
        $this->loginLibrary = $loginLibrary;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->loginLibrary->login($request);
    }

    public function logout(Request $request): JsonResponse
    {
        return $this->loginLibrary->logout($request);
    }
}
