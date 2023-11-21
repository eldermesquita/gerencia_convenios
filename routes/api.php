<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\OrgaoController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\AditivoController;
use App\Http\Controllers\Api\ConvenioController;
use App\Http\Controllers\Api\ContratoController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\EmpresaContratosController;
use App\Http\Controllers\Api\AditivoContratosController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::get('/empresas', [EmpresaController::class, 'index'])->name(
            'empresas.index'
        );
        Route::post('/empresas', [EmpresaController::class, 'store'])->name(
            'empresas.store'
        );
        Route::get('/empresas/{empresa}', [
            EmpresaController::class,
            'show',
        ])->name('empresas.show');
        Route::put('/empresas/{empresa}', [
            EmpresaController::class,
            'update',
        ])->name('empresas.update');
        Route::delete('/empresas/{empresa}', [
            EmpresaController::class,
            'destroy',
        ])->name('empresas.destroy');

        // Empresa Contratos
        Route::get('/empresas/{empresa}/contratos', [
            EmpresaContratosController::class,
            'index',
        ])->name('empresas.contratos.index');
        Route::post('/empresas/{empresa}/contratos', [
            EmpresaContratosController::class,
            'store',
        ])->name('empresas.contratos.store');
    });
