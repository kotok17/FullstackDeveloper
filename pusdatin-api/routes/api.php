<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SkpdController;

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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/kegiatan', [KegiatanController::class, 'index']);
    Route::post('/kegiatan', [KegiatanController::class, 'store']);
    Route::put('/kegiatan/{kegiatan}', [KegiatanController::class, 'update']);
    Route::delete('/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy']);
    Route::post('/kegiatan/{kegiatan}/approve', [KegiatanController::class, 'approve']);

    // SKPD
    Route::get('/skpds', [SkpdController::class, 'index']);
    Route::post('/skpds', [SkpdController::class, 'store']);
    Route::put('/skpds/{id}', [SkpdController::class, 'update']);
    Route::delete('/skpds/{id}', [SkpdController::class, 'destroy']);

    // Periode
    Route::get('/periodes', [PeriodeController::class, 'index']);
    Route::post('/periodes', [PeriodeController::class, 'store']);
    Route::put('/periodes/{id}', [PeriodeController::class, 'update']);
    Route::delete('/periodes/{id}', [PeriodeController::class, 'destroy']);

    Route::get('/usulans', [UsulanController::class, 'index']);
    Route::post('/usulans', [UsulanController::class, 'store']);
    Route::put('/usulans/{id}', [UsulanController::class, 'update']);
    Route::delete('/usulans/{id}', [UsulanController::class, 'destroy']);
    Route::get('/usulans/{id}', [UsulanController::class, 'show']);
});