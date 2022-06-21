<?php

namespace App\Libraries;

use App\Model\MoneyCashModel;
use App\Model\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psr\Log\LoggerInterface;

class UserDataLibrary
{
    protected  $log;

    public function __construct(LoggerInterface $logger)
    {
        $this->log = $logger;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getUserData($request): JsonResponse
    {
        try {
            $user =  User::where('email', $request->email)
                ->with('moneyCash')
                ->first();

            return response()->json(["status" => true, "message" => "Usuario Encontrado", "data" => $user]);
        } catch (\Exception $e){
            return response()->json(["status" => false, "message" => $e]);
        }
    }

    public function registerUser(){
        User::create([
            'name' => 'Rubicel',
            'last_name' => 'Perez',
            'mothers_last_name' => 'Cordova',
            'email'  => 'Rubicel@gmail.com',
            'password' => Hash::make('1234'),
            "systemRole_id" => 2,
            "role_id" => 2,
            "points" => 500,
        ]);

        MoneyCashModel::create([
            'user_id' => 2,
            'value' => 1000,
        ]);
    }
}
