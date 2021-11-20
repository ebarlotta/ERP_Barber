<?php

namespace App\Http\Controllers;

use App\Models\Categoriaproducto;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Unidad;
use Illuminate\Http\Request;

class Productos extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // return view('producto.index',compact(['unidades'=>$unidades,'categoria_productos'=>$categoria_productos,'proveedores'=>$proveedores,'estados'=>$estados,'productos'=>$productos]));
        return view('producto.index',compact('productos', 'unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidad::all();
        $categoria_productos = Categoriaproducto::all();
        $proveedores = Proveedor::all();
        $estados = Estado::all();
        $productos = Producto::where('empresa_id','=',session('empresa_id'));

        return view('producto.create', compact('unidades','categoria_productos','proveedores','estados','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        //dd($request->name);
        $producto = new Producto;
        $producto->name = $request->name;
        // $producto = Producto::create($request->all());
        $producto->descripcion  = $request->descripcion;
        $producto->precio_compra = $request->precio_compra;
        $producto->existencia = $request->existencia;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->lote = $request->lote;
        $producto->unidads_id = $request->unidads_id;
        $producto->categoriaproductos_id = $request->categoriaproductos_id;
        $producto->estados_id = $request->estados_id;
        $nombreCompleto = basename($request->ruta) . time().'.jpg';       //$this->ruta->extension();
        //dd($request->file('ruta'));
        //dd($nombreCompleto); // $this->ruta->storeAs('images2', $nombreCompleto);
        $producto->ruta = $request->file('ruta')->storeAs('images2', $nombreCompleto);
        // $producto->ruta ='';
        $producto->save();
        // $request->save();
        //$postres->imagen = $request->file('imagen')->store('postres');
        // return redirect('producto');
        return redirect()->route('producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Producto::destroy($id);

        $unidades = Unidad::all();
        $categoria_productos = Categoriaproducto::all();
        $proveedores = Proveedor::all();
        $estados = Estado::all();
        $productos = Producto::where('empresa_id','=',session('empresa_id'))->get();

        return view('producto.index',compact('productos', 'unidades'));
    }
}
