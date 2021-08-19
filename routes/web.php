<?php

//use App\Http\Controllers\ClienteController;

use App\Http\Controllers\EmpresaModuloController;
use App\Http\Controllers\EmpresaUsuarioController;
use App\Http\Livewire\Area\AreaComponent;
use App\Http\Livewire\Empresa\EmpresaComponent;
use App\Http\Livewire\Modulo\ModuloComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cuenta\CuentaComponent;
use App\Http\Livewire\Proveedor\ProveedorComponent;
use App\Http\Livewire\Cliente\ClienteComponent;
use App\Http\Livewire\Empleado\EmpleadoComponent;
use App\Http\Livewire\EmpresaUsuarios\EmpresaUsuariosComponent;
use App\Models\EmpresaUsuario;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::resource('cliente', ClienteController::class);

//Route::resource('cliente', ClienteController::class)->names('cliente');
Route::get('areas',AreaComponent::class)->name('areas');
Route::get('cuentas',CuentaComponent::class)->name('cuentas');
Route::get('proveedores',ProveedorComponent::class)->name('proveedores');
Route::get('clientes',ClienteComponent::class)->name('clientes');
Route::get('empleados',EmpleadoComponent::class)->name('empleados');
Route::get('empresausuarios',EmpresaUsuariosComponent::class)->name('empresausuarios');

//Route::resource('empresausuarios/empresa',EmpresaUsuarioController::class)->names('relacionar');
Route::get('empresausuario/{id}', [EmpresaUsuarioController::class,'index'])->name('relacionar');
Route::get('empresausuario/{empresa_id}/{user_id}', [EmpresaUsuarioController::class,'anadirUsuarioEmpresa'])->name('anadirUsuarioEmpresa');

//Route::get('empresausuarios',EmpresaUsuarioController::class)->name('relacionar');


Route::get('empresas',EmpresaComponent::class)->name('empresas');
Route::get('modulos',ModuloComponent::class)->name('modulos');
// Route::get('modulos/{{empresa_id}}',ModuloComponent::class)->name('modulos');
//Route::get( 'modulos/{empresa_id}', ['ModuloComponent@index']);


