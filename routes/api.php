<?php

use App\Http\Controllers\Api\BossControllerTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/{id}' , [BossControllerTest::class , 'show']);
Route::post('/' , [BossControllerTest::class , 'store']);
Route::get('/' , [BossControllerTest::class , 'index']);
Route::post('/{id}' , [BossControllerTest::class , 'update']);
