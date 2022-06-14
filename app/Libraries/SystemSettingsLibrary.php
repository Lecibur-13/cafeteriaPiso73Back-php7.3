<?php

namespace App\Libraries;

use Exception;
use Illuminate\Http\JsonResponse;
use Psr\Log\LoggerInterface;

class SystemSettingsLibrary
{
    protected  $log;

    public function __construct(LoggerInterface $logger)
    {
        $this->log = $logger;
    }

    public function login(): JsonResponse
    {
        try {

            return response()->json([
                "status" => true,
                "settings" => [
                    "APP_NAME" => env("APP_NAME"),
                ]]);

        } catch (Exception $e) {
            $this->log->error(__CLASS__ . " " . __FUNCTION__ . " Exception " . $e->getMessage() . " " . $e->getTraceAsString());
            return response()->json(["status" => true, "settings" => [
                "APP_NAME" => 'Control de Gestión'
            ]]);
        }
    }
}
