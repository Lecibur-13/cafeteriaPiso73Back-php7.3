<?php

namespace App\Http\Controllers;

use App\Libraries\SystemSettingsLibrary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{
    protected  $systemSettingsLibrary;

    public function __construct(SystemSettingsLibrary $systemSettingsLibrary)
    {
        $this->systemSettingsLibrary = $systemSettingsLibrary;
    }

    /**
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        return $this->systemSettingsLibrary->login();
    }
}
