<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use App\Libraries\UserDataLibrary;

class UserDataController extends Controller
{
    protected  $log;
    protected  $UserDataLibrary;

    public function __construct(
        LoggerInterface $logger,
        UserDataLibrary $UserDataLibrary
    )
    {
        $this->log = $logger;
        $this->UserDataLibrary = $UserDataLibrary;
    }

    public function getUserData(Request $request): JsonResponse
    {
        return $this->UserDataLibrary->getUserData($request);
    }

    public function registerUser()
    {
         $this->UserDataLibrary->registerUser();
    }
}
