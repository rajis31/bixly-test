<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BoatController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/csrf', function () {
        return ["csrf" => csrf_token()]; 
    });
    
    Route::get("/cars", [CarController::class, "index"]);
    Route::get("/cars/{id}", [CarController::class, "show"]);
    Route::post("/cars", [CarController::class, "store"]);
    Route::put("/cars/{id}", [CarController::class, "update"]);
    Route::delete("/cars/{id}", [CarController::class, "destroy"]);

    Route::get("/trucks", [TruckController::class, "index"]);
    Route::get("/trucks/{id}", [TruckController::class, "show"]);
    Route::post("/trucks", [TruckController::class, "store"]);
    Route::put("/trucks/{id}", [TruckController::class, "update"]);
    Route::delete("/trucks/{id}", [TruckController::class, "destroy"]);

    Route::get("/boats", [BoatController::class, "index"]);
    Route::get("/boats/{id}", [BoatController::class, "show"]);
    Route::post("/boats", [BoatController::class, "store"]);
    Route::put("/boats/{id}", [BoatController::class, "update"]);
    Route::delete("/boats/{id}", [BoatController::class, "destroy"]);

});
