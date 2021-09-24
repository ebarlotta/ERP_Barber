<?php

//use App\Http\Controllers\ClienteController;

use App\Http\Controllers\ImprimirPDF;
use App\Http\Livewire\Area\AreaComponent;
use App\Http\Livewire\Empresa\EmpresaComponent;
use App\Http\Livewire\Modulo\ModuloComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cuenta\CuentaComponent;
use App\Http\Livewire\Proveedor\ProveedorComponent;
use App\Http\Livewire\Cliente\ClienteComponent;
use App\Http\Livewire\Empleado\EmpleadoComponent;
use App\Http\Livewire\EmpresaModulos\EmpresaModulosComponent;
use App\Http\Livewire\EmpresaUsuarios\EmpresaUsuariosComponent;
use App\Http\Livewire\ModuloUsuarios\ModuloUsuariosComponent;

use App\Http\Livewire\Compra\CompraComponent;
use App\Http\Livewire\Venta\VentaComponent;
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

Route::get('areas',AreaComponent::class)->name('areas');
Route::get('cuentas',CuentaComponent::class)->name('cuentas');
Route::get('proveedores',ProveedorComponent::class)->name('proveedores');
Route::get('clientes',ClienteComponent::class)->name('clientes');
Route::get('empleados',EmpleadoComponent::class)->name('empleados');
Route::get('empresausuarios',EmpresaUsuariosComponent::class)->name('empresausuarios');
Route::get('empresamodulos',EmpresaModulosComponent::class)->name('empresamodulos');
Route::get('modulousuarios',ModuloUsuariosComponent::class)->name('modulousuarios');

Route::get('compras',CompraComponent::class)->name('compras');
Route::get('ventas',VentaComponent::class)->name('ventas');

Route::get('empresas',EmpresaComponent::class)->name('empresas');
Route::get('modulos',ModuloComponent::class)->name('modulos');

Route::get('pdf/deuda/{ddesde}/{dhasta}', [ImprimirPDF::class, 'DeudaPFD'])->name('DeudaPFD');
Route::get('pdf/credito/{cdesde}/{chasta}', [ImprimirPDF::class, 'CreditoPFD'])->name('CreditoPFD');
Route::get('pdf/ivacompras/{anio}/{mes}', [ImprimirPDF::class, 'IvaCompras'])->name('IvaCompras');

Route::get('empresas/prueba',EmpresaComponent::class)->name('empresas.prueba');

Route::get('prueba', function(){
    return view('submenu');
});
Route::get('/prueba', function () {
    return view('prueba');
});
// Route::get('prueba', [EmpresaComponent::class, 'prueba'])->name('prueba');
