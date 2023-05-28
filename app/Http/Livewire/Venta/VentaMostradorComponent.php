<?php

namespace App\Http\Livewire\Venta;

use Livewire\Component;
use App\Models\Area;
use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\EmpresaUsuario;
use App\Models\Iva;
use App\Models\Producto;
use App\Models\Ventas_Productos;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;


class VentaMostradorComponent extends Component
{

    public $empresa_id;
    //Variables de Ventas a Mostrador
    public $productos;  // Listado de productos
    public $productosseleccionados;  // Listado de productos que ya han sido cargados al carrito
    public $search; // nombre del producto a buscar
    public $productoid; //Id del producto seleccionado
    public $nombreproducto; // Nombre del Producto seleccionado
    public $descripcion; //Descripción del producto
    public $cantidad;   // Cantidad seleccionada por el usuario
    public $precioventa;   // Precio de venta del producto
    public $ModalProducto=false; //Modal que muestra la lista de productos para seleccionar
    public $idVenta; // Id de la venta actual
    public $VentaId=0;
    public $html;

    public function render()
    {
        if (!is_null(session('empresa_id'))) { $this->empresa_id = session('empresa_id'); } 
        else { 
            $userid=auth()->user()->id;
            $empresas= EmpresaUsuario::where('user_id',$userid)->get();
            return view('livewire.empresa.empresa-component')->with('empresas', $empresas); 
        }

            $this->productos = Producto::where('empresa_id', $this->empresa_id)->orderBy('name','asc')->get();
            return view('livewire.ventasmostrador.ventamostrador')->extends('layouts.adminlte');
    }

    public function seleccionarproducto($id) {
        //Al hacer clic sobre el botón seleccionar, se cargan los datos del producto para poder completar con la cantidad
        $temp = Producto::find($id);
        $this->productoid = $id;
        $this->nombreproducto = $temp->name;
        $this->descripcion = $temp->descripcion;
        $this->precioventa = number_format($temp->precio_venta, 2, '.', ',') ;
    }

    public function registrar() {
        // Al hacer click sobre registrar se carga el producto al carrito
        
        if ($this->VentaId==0) { 
            $this->idVenta = Venta::updateOrCreate(['id' => $this->idVenta], [
                'fecha'             => now(),
                'comprobante'       => 0,
                'detalle'           => '',
                'BrutoComp'         => 0,
                'ParticIva'         => 'Temporal',
                'MontoIva'          => 0,
                'ExentoComp'        => 0,
                'ImpInternoComp'    => 0,
                'PercepcionIvaComp' => 0,
                'RetencionIB'       => 0,
                'RetencionGan'      => 0,
                'NetoComp'          => 0,
                'MontoPagadoComp'   => 0,
                'CantidadLitroComp' => 0,
                'Anio'              => date('Y'),
                'PasadoEnMes'       => idate("m"),
                'iva_id'            => 1,
                'area_id'           => 109,     //Mostrador
                'cuenta_id'         => 192,     // Venta
                'user_id'           => auth()->user()->id,
                'empresa_id'        => session('empresa_id'),
                'cliente_id'        => 202,     //Consumidor final
            ]);
            //session()->flash('message', 'Comprobante Creado.');
            $this->VentaId=$this->idVenta->id;
        }
        
        Ventas_Productos::create([
            'productos_id'    => $this->productoid,
            'ventas_id'    => $this->idVenta->id,
            'precio'    => $this->precioventa,
            'cantidad'    => $this->cantidad,
            'user_id'=> auth()->user()->id,
        ]);
         
        // $sql ="SELECT ventas__productos.*, productos.name, productos.descripcion FROM `ventas__productos` inner join productos WHERE ventas__productos.productos_id = productos.id and ventas_id=" . $this->idVenta->id;
        $this->CargarListado();
        //dd($this->productosseleccionados);
        // $this->productosseleccionados = Ventas_Productos::where('ventas_ids', $this->idVenta->id)
        // ->innerjoin('productos.id','=','ventas__productos.productos_id')
        // ->get();
        //$this->productosseleccionados = DB::select(DB::raw($sql));

        
        $this->openModalProducto();
    }
    
    public function openModalProducto() {
        $this->ModalProducto = !$this->ModalProducto;
        //$this->CargarListado();
        //dd($this->productosseleccionados);
    }

    public function CargarListado() {
        //dd($this->idVenta->id);
        if(!is_null($this->idVenta->id)) {
            $this->productosseleccionados = Ventas_Productos::where('ventas_id', $this->idVenta->id)
            ->join('productos','ventas__productos.productos_id','=','productos.id')
            ->get();
        }
    }

    public function eliminarItem($productos_id, $ventas_id) {
        // $Item = Ventas_Productos::where('productos_id',$productos_id)
        // ->where('ventas_id',$ventas_id)
        // ->get('id');
        //dd($Item);
        $sql ='DELETE FROM ventas__productos WHERE productos_id=' . $productos_id . ' and ventas_id=' . $ventas_id;
        //dd($sql);
        $datos = DB::select(DB::raw($sql)); 
        $this->CargarListado();
    }

}
