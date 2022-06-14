<?php

namespace App\Http\Controllers;

use App\Libraries\TransactionLibrary;
use App\Libraries\UserDataLibrary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class TransactionController extends Controller
{
    protected  $log;
    protected  $TransactionLibrary;

    public function __construct(
        LoggerInterface $logger,
        TransactionLibrary $TransactionLibrary
    ){
        $this->log = $logger;
        $this->TransactionLibrary = $TransactionLibrary;
    }

    public function saveTransaction(Request $request): JsonResponse
    {
        return $this->TransactionLibrary->saveTransaction($request);
    }
}
