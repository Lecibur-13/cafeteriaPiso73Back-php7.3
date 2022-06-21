<?php

namespace App\Libraries;

use App\Model\SystemSettingsModel;
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

    /**
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        try {
            $settings = SystemSettingsModel::all();
            return response()->json([
                "status" => true,
                "settings" => [
                    "APP_NAME" => env("APP_NAME"),
                    "system_settings" => $settings,
                ]]);

        } catch (Exception $e) {
            $this->log->error(__CLASS__ . " " . __FUNCTION__ . " Exception " . $e->getMessage() . " " . $e->getTraceAsString());
            return response()->json(["status" => true, "settings" => [
                "APP_NAME" => 'Control de Gestión'
            ]]);
        }
    }
}
