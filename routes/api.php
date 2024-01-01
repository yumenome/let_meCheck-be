<?php

use App\Http\Controllers\PhoneController;
use App\Http\Resources\BrandResource;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/brands', function() {
    return BrandResource::collection(Brands::all());
});

Route::apiResource('phones',PhoneController::class);

Route::get('/brands/{id}',[PhoneController::class, 'find']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
