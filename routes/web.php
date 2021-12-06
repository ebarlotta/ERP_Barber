<?php

//use App\Http\Controllers\ClienteController;

use App\Http\Controllers\ImprimirPDF;
use App\Http\Controllers\Productos;
use App\Http\Livewire\Area\AreaComponent;
use App\Http\Livewire\Empresa\EmpresaComponent;
use App\Http\Livewire\Modulo\ModuloComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cuenta\CuentaComponent;
use App\Http\Livewire\Proveedor\ProveedorComponent;
use App\Http\Livewire\Cliente\ClienteComponent;
use App\Http\Livewire\Empleado\EmpleadoComponent;

use App\Http\Livewire\Compra\CompraComponent;
use App\Http\Livewire\Venta\VentaComponent;
use App\Http\Controllers\SocialController;
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


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);

Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);


Route::get('/', EmpresaComponent::class)->name('inicio');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('areas',AreaComponent::class)->name('areas');
Route::get('cuentas',CuentaComponent::class)->name('cuentas');
Route::get('proveedores',ProveedorComponent::class)->name('proveedores');
Route::get('clientes',ClienteComponent::class)->name('clientes');
Route::get('empleados',EmpleadoComponent::class)->name('empleados');

Route::get('compras',CompraComponent::class)->name('compras');
Route::get('ventas',VentaComponent::class)->name('ventas');

Route::get('empresas',EmpresaComponent::class)->name('empresas');
Route::get('modulos',ModuloComponent::class)->name('modulos');

Route::get('pdf/deuda/{ddesde}/{dhasta}', [ImprimirPDF::class, 'DeudaPFD'])->name('DeudaPFD');
Route::get('pdf/credito/{cdesde}/{chasta}', [ImprimirPDF::class, 'CreditoPFD'])->name('CreditoPFD');
Route::get('pdf/ivacompras/{anio}/{mes}', [ImprimirPDF::class, 'IvaCompras'])->name('IvaCompras');

Route::get('producto/addtag/{product_id}/{tag_id}', [Productos::class, 'addtag'])->name('producto.addtag');
Route::get('producto/deltag/{product_id}/{tag_id}', [Productos::class, 'deltag'])->name('producto.deltag');
Route::get('producto/tag', [Productos::class, 'tag'])->name('producto.tag');
Route::get('producto/{producto}/tagedit', [Productos::class, 'tagedit'])->name('producto.tagedit');

Route::resource('producto',Productos::class);

Route::get('producto/productobajas', [Productos::class, 'productobajas'])->name('producto.productobajas');

// Route::get('empresas/config', function () {
//     return view('adminlte');
// });

// Route::get('welcome', function () {
//     return view('welcome');
// });
