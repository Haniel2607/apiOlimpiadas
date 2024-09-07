<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtletasController;
use App\Http\Controllers\MedalhasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/',function(){return response()->json(['Sucesso'=>true]);});

Route::get('/atletas',[AtletasController::class,'index']);

Route::get('/atletas/{idAtleta}',[AtletasController::class,'show']);

Route::post('/atletas',[AtletasController::class,'store']);

Route::put('/atletas/{idAtleta}',[AtletasController::class,'update']);

Route::delete('/atletas/{idAtleta}',[AtletasController::class,'destroy']);



Route::get('/',function(){return response()->json(['Sucesso'=>true]);});

Route::get('/medalhas',[MedalhasController::class,'index']);

Route::get('/medalhas/{idMedalha}',[MedalhasController::class,'show']);

Route::post('/medalhas',[MedalhasController::class,'store']);

Route::put('/medalhas/{idMedalha}',[MedalhasController::class,'update']);

Route::delete('/medalhas/{idMedalha}',[MedalhasController::class,'destroy']);