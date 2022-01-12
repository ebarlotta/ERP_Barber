<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Categoriaproducto;
use App\Models\Producto;
use App\Models\Empresa;

class Cart extends Component
{
    public $ModalDetail = false;
    public $Modal_Carrito = false;

    public function render()
    {
        // dd(session('empresa_id'));
        $this->empresa = Empresa::where('id','=',session('empresa_id'))->get();
        $this->categorias = Categoriaproducto::where('empresa_id','=',session('empresa_id'))->orderby('id')->get();
        $this->productos = Producto::where('empresa_id','=',session('empresa_id'))->get();
        $this->minRangePrice = $this->productos->min('precio_compra');
        $this->maxRangePrice = $this->productos->max('precio_compra');
        //$this->productos = Producto::where('empresa_id','=',session('empresa_id'))->orderby('categoriaproductos_id')->get();
        //dd($this->productos);

        return view('livewire.cart.index',['datos'=> Producto::where('empresa_id','=',session('empresa_id'))->orderby('categoriaproductos_id')->paginate(18),]);
    }

    public function single($id) {
        // dd("entro".$id);
        $this->ModalDetail = true;
        $this->producto_detail = Producto::find($id);
        return view('livewire.cart.single');
    }

    public function CloseModal() {
        $this->ModalDetail = false;
    }

    public function show_carrito($id) {
        // dd("entro".$id);
        $this->Modal_Carrito = true;
        //dd("entro");
        $this->producto_detail = Producto::find($id);
        // return view('livewire.cart.single');
    }

    public function CloseModal_Carrito() {
        $this->Modal_Carrito = false;
    }
}
