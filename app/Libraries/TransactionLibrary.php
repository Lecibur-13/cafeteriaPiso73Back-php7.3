<?php

namespace App\Libraries;

use App\Model\HistoryTransactionModel;
use App\Model\MoneyCashModel;
use App\Model\User;
use Illuminate\Http\JsonResponse;
use Psr\Log\LoggerInterface;

class TransactionLibrary
{
    protected  $log;

    public function __construct(LoggerInterface $logger)
    {
        $this->log = $logger;
    }

    public function saveTransaction($request): JsonResponse
    {

        try {
            HistoryTransactionModel::create([
                "total" => $request->total,
                "discount" => $request->discount,
                "money_cash" => $request->moneyCash,
                "points" => $request->points,
                "user_id" => $request->userId,
            ]);

            User::where('id', $request->userId)->update([
                'points' => $request->currentPoints - $request->points
            ]);
            MoneyCashModel::where('user_id', $request->userId)->update([
                'value' => $request->currentMoneyCash  - $request->moneyCash
            ]);

            return response()->json(["status" => true, "message" => "Transaccion guardada"]);
        } catch (\Exception $e){
            return response()->json(["status" => false, "message" => $e]);
        }
    }
}
