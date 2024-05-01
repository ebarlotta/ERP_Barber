<?php

use App\Http\Livewire\EmpresaGestion\EmpresaGestion;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EmpresaModulos\EmpresaModulosComponent;
use App\Http\Livewire\EmpresaUsuarios\EmpresaUsuariosComponent;
use App\Http\Livewire\ModuloUsuarios\ModuloUsuariosComponent;
<<<<<<< HEAD
=======
//use App\Http\Livewire\Categoria\CategoriaProductoComponent;
use App\Http\Livewire\Categoria\CategoriaproductoComponent;
use App\Http\Livewire\Estado\EstadoComponent;
use App\Http\Livewire\Producto\ProductoComponent;
use App\Http\Livewire\Tag\TagComponent;
use App\Http\Livewire\Unidad\UnidadComponent;
use App\Http\Livewire\Tablas\TablasComponent;
use App\Http\Livewire\Tablas\EditarTablaComponent;
use App\Http\Livewire\Tablas\VisualizarTablaComponent;
use App\Http\Livewire\Haberes\HaberesComponent;
use App\Http\Livewire\Categoriaprofesional\CategoriaprofesionalComponent;
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52

Route::get('empresausuarios',EmpresaUsuariosComponent::class)->name('empresausuarios');
Route::get('empresamodulos',EmpresaModulosComponent::class)->name('empresamodulos');
Route::get('modulousuarios',ModuloUsuariosComponent::class)->name('modulousuarios');
<<<<<<< HEAD
Route::get('empresagestion',EmpresaGestion::class)->name('empresagestion');
=======
Route::get('empresagestion',EmpresaGestion::class)->name('empresagestion');
Route::get('tags',TagComponent::class)->name('tags');
Route::get('unidades',UnidadComponent::class)->name('unidades');
Route::get('categoriaproducto',CategoriaproductoComponent::class)->name('categoriaproducto');
Route::get('estados',EstadoComponent::class)->name('estados');
Route::get('productos',ProductoComponent::class)->name('productos');
Route::get('tablas',TablasComponent::class)->name('tablas');
Route::get('tablas-edit',EditarTablaComponent::class)->name('tablas-edit');
Route::get('tablas-ver',VisualizarTablaComponent::class)->name('tablas-ver');
Route::get('haberes',HaberesComponent::class)->name('haberes');
Route::get('categoriaprofesional',CategoriaprofesionalComponent::class)->name('categoriaprofesional');
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
