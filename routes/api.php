<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SystemSettingsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('status', function () {
    return response()->json(["status" => true, "message" => "active service"]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('registerUser', [UserDataController::class, 'registerUser']);
});

//Route::group(['middleware' => ['admin']], function () {
Route::post('user/getData', [UserDataController::class, 'getUserData']);
Route::get('user/registerUser', [UserDataController::class, 'registerUser']);
Route::post('transaction/saveTransaction', [TransactionController::class, 'saveTransaction']);
//});

Route::post('logout', [LoginController::class, 'logout']);

Route::get('systemSettings/login', [SystemSettingsController::class, 'login']);
