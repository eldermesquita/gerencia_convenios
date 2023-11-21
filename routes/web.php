<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrgaoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AditivoController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('empresas', [EmpresaController::class, 'index'])->name( 'empresas.index');
        Route::post('empresas', [EmpresaController::class, 'store'])->name( 'empresas.store');
        Route::get('empresas/create', [EmpresaController::class,'create',])->name('empresas.create');
        Route::get('empresas/{empresa}', [EmpresaController::class,'show',])->name('empresas.show');
        Route::get('empresas/{empresa}/edit', [EmpresaController::class,'edit',])->name('empresas.edit');
        Route::put('empresas/{empresa}', [EmpresaController::class,'update',])->name('empresas.update');
        Route::delete('empresas/{empresa}', [EmpresaController::class,'destroy',])->name('empresas.destroy');

        Route::get('users', [UserController::class, 'index'])->name( 'users.index');
        Route::post('users', [UserController::class, 'store'])->name( 'users.store');
        Route::get('users/create', [UserController::class, 'create'])->name( 'users.create');
        Route::get('users/{user}', [UserController::class, 'show'])->name( 'users.show');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name( 'users.edit');
        Route::put('users/{user}', [UserController::class, 'update'])->name( 'users.update');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name( 'users.destroy');

        Route::get('convenios', [ConvenioController::class, 'index'])->name( 'convenios.index');
        Route::post('convenios', [ConvenioController::class, 'store'])->name( 'convenios.store');
        Route::get('convenios/create', [ConvenioController::class,'create',])->name('convenios.create');
        Route::get('convenios/{convenio}', [ConvenioController::class,'show',])->name('convenios.show');
        Route::get('convenios/{convenio}/edit', [ConvenioController::class,'edit',])->name('convenios.edit');
        Route::put('convenios/{convenio}', [ConvenioController::class,'update',])->name('convenios.update');
        Route::delete('convenios/{convenio}', [ConvenioController::class,'destroy',])->name('convenios.destroy');

        Route::get('aditivos', [AditivoController::class, 'index'])->name( 'aditivos.index');
        Route::post('aditivos', [AditivoController::class, 'store'])->name( 'aditivos.store');
        Route::get('aditivos/create', [AditivoController::class,'create',])->name('aditivos.create');
        Route::get('aditivos/{aditivo}', [AditivoController::class,'show',])->name('aditivos.show');
        Route::get('aditivos/{aditivo}/edit', [AditivoController::class,'edit',])->name('aditivos.edit');
        Route::put('aditivos/{aditivo}', [AditivoController::class,'update',])->name('aditivos.update');
        Route::delete('aditivos/{aditivo}', [AditivoController::class,'destroy',])->name('aditivos.destroy');

        Route::get('orgao-lista', [OrgaoController::class, 'lista'])->name( 'orgaos.lista');
        Route::get('orgaos', [OrgaoController::class, 'index'])->name( 'orgaos.index');
        Route::post('orgaos', [OrgaoController::class, 'store'])->name( 'orgaos.store');
        Route::get('orgaos/create', [OrgaoController::class, 'create'])->name( 'orgaos.create');
        Route::get('orgaos/{orgao}', [OrgaoController::class, 'show'])->name( 'orgaos.show');
        Route::get('orgaos/{orgao}/edit', [OrgaoController::class,'edit',])->name('orgaos.edit');
        Route::put('orgaos/{orgao}', [OrgaoController::class, 'update'])->name( 'orgaos.update');
        Route::delete('orgaos/{orgao}', [OrgaoController::class,'destroy',])->name('orgaos.destroy');

        Route::get('contratos-lista', [ContratoController::class, 'lista'])->name( 'contratos.lista');
        Route::get('contratos', [ContratoController::class, 'index'])->name( 'contratos.index');
        Route::post('contratos', [ContratoController::class, 'store'])->name( 'contratos.store');
        Route::get('contratos/create', [ContratoController::class,'create',])->name('contratos.create');
        Route::get('contratos/{contrato}', [ContratoController::class,'show',])->name('contratos.show');
        Route::get('contratos/{contrato}/edit', [ContratoController::class,'edit',])->name('contratos.edit');
        Route::put('contratos/{contrato}', [ContratoController::class,'update',])->name('contratos.update');
        Route::delete('contratos/{contrato}', [ContratoController::class,'destroy',])->name('contratos.destroy');
    });
