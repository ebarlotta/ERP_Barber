<?php

namespace App\Http\Controllers;

use App\Models\Categoriaproducto;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Unidad;
use App\Models\Tag;
use App\Models\ProductoTag;

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
  
        $productos = Producto::where('empresa_id','=',session('empresa_id'))->get();

        return view('producto.index',compact('productos'));
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
        $productos = Producto::where('empresa_id','=',session('empresa_id'))->get();

        $tags = Tag::where('empresa_id','=',session('empresa_id'))->get();

        return view('producto.create', compact('unidades','categoria_productos','proveedores','estados','productos','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $producto = new Producto;
        $producto->name = $request->name;
        $producto->descripcion  = $request->descripcion;
        $producto->precio_compra = $request->precio_compra;
        $producto->existencia = $request->existencia;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->lote = $request->lote;
        $producto->unidads_id = $request->unidads_id;
        $producto->categoriaproductos_id = $request->categoriaproductos_id;
        $producto->estados_id = $request->estados_id;
        $nombreCompleto = basename($request->ruta) . time().'.jpg';       //$this->ruta->extension();
        //return $nombreCompleto;
        $request->file('ruta')->store($nombreCompleto);
        //dd($nombreCompleto); // $this->ruta->storeAs('images2', $nombreCompleto);
        $producto->ruta = $nombreCompleto;
        //$producto->ruta ='';
        $producto->save();

        //$postres->imagen = $request->file('imagen')->store('postres');

        return redirect()->route('producto.index');
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
        $unidades = Unidad::all();
        $categoria_productos = Categoriaproducto::all();
        $proveedores = Proveedor::all();
        $estados = Estado::where('empresa_id','=',session('empresa_id'))->get();
        //$productos = Producto::where('empresa_id','=',session('empresa_id'))->get();
        
        $producto = Producto::find($id);

        return view('producto.edit',compact('unidades','categoria_productos','proveedores','estados','producto'));
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
        $producto = Producto::find($id);

        $producto->name = $request->name;
        $producto->descripcion  = $request->descripcion;
        $producto->precio_compra = $request->precio_compra;
        $producto->existencia = $request->existencia;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->lote = $request->lote;
        $producto->unidads_id = $request->unidads_id;
        $producto->categoriaproductos_id = $request->categoriaproductos_id;
        $producto->estados_id = $request->estados_id;
        $nombreCompleto = basename($request->ruta) . time().'.jpg';
        
        // $producto->ruta == null ? '' : $producto->ruta=$request->file('ruta')->store($nombreCompleto);
        
        $producto->save();
        
        return redirect()->route('producto.index',compact('producto'))->with('message','Producto actualizado');
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

        $productos = Producto::where('empresa_id','=',session('empresa_id'))->get();

        return view('producto.index',compact('productos'))->with('message','Producto eliminado');
    }

    public function tag() {

        $productos = Producto::where('empresa_id','=',session('empresa_id'))->get();

        return view('producto.tag',compact('productos'));
    }

    public function tagedit(Producto $producto) {
        
        $tags = Tag::where('empresa_id','=',session('empresa_id'))->get();
        // $tagsactivos = ProductoTag::join('productos','producto_tags.id', '=', 'producto_tags.id')
        // ->where('productos.id','=',$producto->id)->get();
        // $tagsactivos = ProductoTag::join('productos','producto_tags.producto_id', '=', 'productos.id')
        // ->where('producto_tags.producto_id','=',$producto->id)->get();

        $tagsactivos = Tag::join('producto_tags','producto_tags.tag_id', '=', 'tags.id')
            ->where('empresa_id','=',session('empresa_id'))
            ->where('producto_tags.producto_id','=',$producto->id)->get();

        return view('producto.tagedit',compact('producto','tags','tagsactivos'));
        
    }

    public function addtag($producto_id, $tag_id) {
        
        $producto=Producto::find($producto_id);
        
        $rel = new ProductoTag;
        $rel->producto_id=$producto_id;
        $rel->tag_id=$tag_id;
        $rel->valor='';
        $rel->save();

        $tags = Tag::where('empresa_id','=',session('empresa_id'))->get();
        $tagsactivos = ProductoTag::where('producto_id','=',$producto->id)->get();

        return redirect()->route('producto.tagedit',compact('producto','tags','tagsactivos'));
    }

    public function deltag($producto_id, $tag_id) {
        
        $producto=ProductoTag::where('producto_id',$producto_id)
            ->where('tag_id',$tag_id)
            ->delete();

        //return $producto->all();
        $tags = Tag::where('empresa_id','=',session('empresa_id'))->get();
        $tagsactivos = ProductoTag::where('producto_id','=',$producto_id)->get();

        return redirect()->route('producto.tagedit',compact('producto','tags','tagsactivos'));
    }
}
