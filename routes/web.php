<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrgaoController;
use App\Http\Controllers\AditivoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\CategriaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ModalidadeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ParlamentarController;
use App\Http\Controllers\ProcessoHistoricoController;

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


        Route::get('convenios', [ConvenioController::class, 'index'])->name('convenios.index' );
        Route::post('convenios', [ConvenioController::class, 'store'])->name('convenios.store');
        Route::get('convenios/create', [ConvenioController::class,'create',])->name('convenios.create');
        Route::get('convenios/{convenio}', [ConvenioController::class,'show',])->name('convenios.show');
        Route::get('convenios/{convenio}/edit', [ConvenioController::class,'edit',])->name('convenios.edit');
        Route::put('convenios/{convenio}', [ ConvenioController::class,'update',])->name('convenios.update');
        Route::delete('convenios/{convenio}', [ConvenioController::class,'destroy',])->name('convenios.destroy');


        Route::get('processos', [ProcessoController::class, 'index'])->name('processos.index');
        Route::post('processos', [ProcessoController::class, 'store'])->name('processos.store');
        Route::get('processos/create', [ProcessoController::class,'create',])->name('processos.create');
        Route::get('processos/{processo}', [ProcessoController::class,'show',])->name('processos.show');
        Route::get('processos/{processo}/edit', [ProcessoController::class,'edit',])->name('processos.edit');
        Route::put('processos/{processo}', [ProcessoController::class,'update',])->name('processos.update');
        Route::delete('processos/{processo}', [ProcessoController::class,'destroy',])->name('processos.destroy');


        Route::get('orgao-lista', [OrgaoController::class, 'lista'])->name( 'orgaos.lista');
        Route::get('orgaos', [OrgaoController::class, 'index'])->name('orgaos.index');
        Route::post('orgaos', [OrgaoController::class, 'store'])->name('orgaos.store');;
        Route::get('orgaos/create', [OrgaoController::class, 'create'])->name('orgaos.create');
        Route::get('orgaos/{orgao}', [OrgaoController::class, 'show'])->name('orgaos.show');
        Route::get('orgaos/{orgao}/edit', [OrgaoController::class,'edit',])->name('orgaos.edit');
        Route::put('orgaos/{orgao}', [OrgaoController::class, 'update'])->name('orgaos.update');
        Route::delete('orgaos/{orgao}', [OrgaoController::class,'destroy',])->name('orgaos.destroy');

        Route::get('processo-historicos', [ProcessoHistoricoController::class,'index',])->name('processo-historicos.index');
        Route::post('processo-historicos', [ProcessoHistoricoController::class,'store',])->name('processo-historicos.store');
        Route::get('processo-historicos/create', [ProcessoHistoricoController::class,'create',])->name('processo-historicos.create');
        Route::get('processo-historicos/{processoHistorico}', [ProcessoHistoricoController::class,'show',])->name('processo-historicos.show');
        Route::get('processo-historicos/{processoHistorico}/edit', [ProcessoHistoricoController::class,'edit',])->name('processo-historicos.edit');
        Route::put('processo-historicos/{processoHistorico}', [ProcessoHistoricoController::class,'update',])->name('processo-historicos.update');
        Route::delete('processo-historicos/{processoHistorico}', [ProcessoHistoricoController::class,'destroy',])->name('processo-historicos.destroy');

        Route::get('aditivos', [AditivoController::class, 'index'])->name('aditivos.index');
        Route::post('aditivos', [AditivoController::class, 'store'])->name('aditivos.store');
        Route::get('aditivos/create', [AditivoController::class,'create',])->name('aditivos.create');
        Route::get('aditivos/{aditivo}', [AditivoController::class,'show',])->name('aditivos.show');
        Route::get('aditivos/{aditivo}/edit', [AditivoController::class,'edit',])->name('aditivos.edit');
        Route::put('aditivos/{aditivo}', [AditivoController::class,'update',])->name('aditivos.update');
        Route::delete('aditivos/{aditivo}', [AditivoController::class,'destroy',])->name('aditivos.destroy');

        Route::get('categrias', [CategriaController::class, 'index'])->name('categrias.index');
        Route::post('categrias', [CategriaController::class, 'store'])->name('categrias.store');
        Route::get('categrias/create', [CategriaController::class,'create',])->name('categrias.create');
        Route::get('categrias/{categria}', [CategriaController::class,'show',])->name('categrias.show');
        Route::get('categrias/{categria}/edit', [CategriaController::class,'edit',])->name('categrias.edit');
        Route::put('categrias/{categria}', [CategriaController::class,'update',])->name('categrias.update');
        Route::delete('categrias/{categria}', [CategriaController::class,'destroy',])->name('categrias.destroy');

        Route::get('empresas', [EmpresaController::class, 'index'])->name('empresas.index');
        Route::post('empresas', [EmpresaController::class, 'store'])->name('empresas.store');
        Route::get('empresas/create', [EmpresaController::class,'create',])->name('empresas.create');
        Route::get('empresas/{empresa}', [EmpresaController::class,'show',])->name('empresas.show');
        Route::get('empresas/{empresa}/edit', [EmpresaController::class,'edit',])->name('empresas.edit');
        Route::put('empresas/{empresa}', [EmpresaController::class,'update',])->name('empresas.update');
        Route::delete('empresas/{empresa}', [EmpresaController::class,'destroy',])->name('empresas.destroy');

        Route::get('parlamentares-lista', [ParlamentarController::class,'lista',])->name('parlamentares.lista');
        Route::get('parlamentares', [ParlamentarController::class,'index',])->name('parlamentares.index');
        Route::post('parlamentares', [ParlamentarController::class,'store',])->name('parlamentares.store');
        Route::get('parlamentares/create', [ParlamentarController::class,'create',])->name('parlamentares.create');
        Route::get('parlamentares/{parlamentar}', [ParlamentarController::class,'show',])->name('parlamentares.show');
        Route::get('parlamentares/{parlamentar}/edit', [ParlamentarController::class,'edit',])->name('parlamentares.edit');
        Route::put('parlamentares/{parlamentar}', [ParlamentarController::class,'update',])->name('parlamentares.update');
        Route::delete('parlamentares/{parlamentar}', [ParlamentarController::class,'destroy',])->name('parlamentares.destroy');

        Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
        Route::get('usuarios/create', [UsuarioController::class,'create',])->name('usuarios.create');
        Route::get('usuarios/{usuario}', [UsuarioController::class,'show',])->name('usuarios.show');
        Route::get('usuarios/{usuario}/edit', [UsuarioController::class,'edit',])->name('usuarios.edit');
        Route::put('usuarios/{usuario}', [UsuarioController::class,'update',])->name('usuarios.update');
        Route::delete('usuarios/{usuario}', [UsuarioController::class,'destroy',])->name('usuarios.destroy');

       Route::get('contratos-lista', [ContratoController::class, 'lista'])->name('contratos.lista');
        Route::get('contratos', [ContratoController::class, 'index'])->name('contratos.index');
        Route::post('contratos', [ContratoController::class, 'store'])->name('contratos.store');
        Route::get('contratos/create', [ContratoController::class,'create',])->name('contratos.create');
        Route::get('contratos/{contrato}', [ContratoController::class,'show',])->name('contratos.show');
        Route::get('contratos/{contrato}/edit', [ContratoController::class,'edit',])->name('contratos.edit');
        Route::put('contratos/{contrato}', [ContratoController::class,'update',])->name('contratos.update');
        Route::delete('contratos/{contrato}', [ContratoController::class,'destroy',])->name('contratos.destroy');
    });
