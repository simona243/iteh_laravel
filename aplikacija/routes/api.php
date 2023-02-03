<?php

use App\Http\Controllers\Autentifikacija;
use App\Http\Controllers\KnjigaController;
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


Route::post('/register',[Autentifikacija::class,'register']);
Route::post('/login',[Autentifikacija::class,'login']);


Route::get('/knjige',[KnjigaController::class,'index']);
Route::get('/knjige/{id}',[KnjigaController::class,'show']);





Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::put('/knjige/{id}',[KnjigaController::class,'update']);
    Route::post('/knjige',[KnjigaController::class,'store']);
    Route::delete('/knjige/{id}',[KnjigaController::class,'destroy']);




    Route::post('/logout',[Autentifikacija::class,'logout']);

 
});
