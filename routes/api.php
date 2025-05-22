<?php

use App\Http\Controllers\forgetPasswordController;
use App\Http\Controllers\InscriptionController;
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
Route::post('/auth/inscription', [InscriptionController::class, 'inscription']);
Route::post('/auth/connexion', [InscriptionController::class, 'connexion']);
 
 Route::get("/forgetpass",[forgetPasswordController::class,'forgetpass']);
 Route::post("/forgetpassPost",[forgetPasswordController::class,'forgetpass']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
