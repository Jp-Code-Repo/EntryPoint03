<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'service' => 'EntryPoint API'
    ]);
});

Route::post('/auth/login', [AuthController::class, 'login']);

//test route
Route::middleware(['auth:sanctum', 'role:SUPER_ADMIN'])->get('/admin-only', function () {
    return response()->json([
        'message' => 'Welcome, Super Admin'
    ]);
});

//test route
Route::middleware(['auth:sanctum', 'role:ADMIN'])
    ->get('/admin-test', function () {
        return response()->json(['message' => 'ADMIN ACCESS OK']);
    });
