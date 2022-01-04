<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Categoriaproducto;
use App\Models\Producto;
use App\Models\Empresa;

class Cart extends Component
{
    public function render()
    {
        // dd(session('empresa_id'));
        $this->empresa = Empresa::where('id','=',session('empresa_id'))->get();
        $this->categorias = Categoriaproducto::where('empresa_id','=',session('empresa_id'))->orderby('id')->get();
        $this->productos = Producto::where('empresa_id','=',session('empresa_id'))->get();
        $this->minRangePrice = $this->productos->min('precio_compra');
        $this->maxRangePrice = $this->productos->max('precio_compra');
        $this->productos = Producto::where('empresa_id','=',session('empresa_id'))->orderby('categoriaproductos_id')->get();
        //dd($this->productos);
        return view('livewire.cart.index');
    }
}
