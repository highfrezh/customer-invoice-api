<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\API\V1\RegisterController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    // register route
    Route::post('register', [RegisterController::class, 'Register']);

    Route::group(['middleware'=>'auth:sanctum'], function(){
        // customers resources
        Route::apiResource('customers', CustomerController::class);
        // invoices resources
        Route::apiResource('invoices', InvoiceController::class);

        Route::post('invoices/bulk', [InvoiceController::class, 'bulkStore']);
    });
});
