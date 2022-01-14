<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Categoriaproducto;
use App\Models\Producto;
use App\Models\Empresa;
use App\Models\Cart as Carro;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $ModalDetail = false;
    public $Modal_Carrito = false;
    public $ModalDescontar = false;
    public $Item_a_eliminar = 0;
    public $subtotal = 0;

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
        $this->detalles = CartProduct::where('user_id','=',Auth::user()->id)
        ->join('productos','productos.id','=','cart_products.productos_id')->get();

        $this->ofertas_especiales = Producto::where('empresa_id','=',session('empresa_id'))->where('descuento_especial','=',1)->get();
        // dd($this->detalles);

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

    public function show_carrito() {
        $Acum = 0;
        $this->Modal_Carrito = true;
        $this->data = CartProduct::where('user_id','=',Auth::user()->id)
        ->join('productos','productos.id','=','cart_products.productos_id')->get();

        foreach($this->data as $data) {
            if ($data->descuento>0) {
                $result = $data->precio_venta*(1-$data->descuento/100) * $data->cantidad;
            } else {
                $result = $data->precio_venta* $data->cantidad;
            }
            $Acum = $Acum + $result;
        }
        $this->subtotal = $Acum;
    }

    public function CloseModal_Carrito() {
        $this->Modal_Carrito = false;
    }

    public function Agregar($id){
        $carrito = Carro::where('user_id', '=', Auth::user()->id)->get();
        
        if (count($carrito)==0) {
            $carrito = new Carro(['user_id' => Auth::user()->id]);
            $carrito->save();
        }

        $detalle = CartProduct::where('user_id','=',Auth::user()->id)
                            ->where('productos_id','=',$id)->get();
        
        if(count($detalle)) {
            $detalle = CartProduct::find($detalle[0]['id']);
            $detalle->cantidad++;
        }
        else {
            $detalle = new CartProduct(['user_id'=>Auth::user()->id,'productos_id'=>$id,'cantidad'=>1]);            
        }
        $detalle->save();

        $this->show_carrito();
    }

    public function Descontar($id) {
        $descontar = CartProduct::where('productos_id','=',$id)->where('user_id','=',Auth::user()->id)->first();
        if ($descontar->cantidad === 1.0 ) {
            $this->Item_a_eliminar = $descontar->id;
            $this->ModalDescontar = true;
        }
        else {
            $descontar->cantidad--;
            $descontar->save();
        }
    }

    public function CloseModal_Descontar() {
        $this->ModalDescontar = false;
    }

    public function Sacar($id) {
        $descontar = CartProduct::find($id);
        //$descontar = CartProduct::where('productos_id','=',$id)->where('user_id','=',Auth::user()->id)->first();
        //dd($descontar);
        $descontar->destroy($id);
        $this->Item_a_eliminar = 0;
        $this->CloseModal_Descontar();
    }    

    public function ActualizarCantidad($id, $cantidad) {
        $detalle = CartProduct::where('user_id','=',Auth::user()->id)
        ->where('productos_id','=',$id)
        ->get();
        
        if(is_numeric($cantidad)) {
        $cantidad = abs($cantidad);// dd($cantidad);
        
        // $cantidad->validate([
        //     'cantidad' => 'required',
        // ]);
        return $cantidad;
        }
    }

    public function payment_index() {
        return view('livewire.cart.payment');
    }

}
