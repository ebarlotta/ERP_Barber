<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\EmpresaUsuario;
use App\Models\User;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\DB;

class EmpresaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $usuarios = DB::table('users')->distinct()
            ->join('empresa_usuarios', 'users.id', '=' ,'empresa_usuarios.user_id')
            ->join('empresas',  'empresas.id', '=', 'empresa_usuarios.empresa_id',)
            //->join('empresas',  'empresas.id', '=', 'empresa_usuarios.empresa_id',)
            ->where('empresas.id', $id)
            ->select('users.*', 'empresas.name as empresa')
            ->get();

        $users = User::all();
        $empresa = Empresa::find($id);
        return view('empresa.index',compact('users','empresa','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function anadirUsuarioEmpresa($empresa_id,$user_id) {
        $a = EmpresaUsuario::create($empresa_id,$user_id);
        return redirect('empresa.index2');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpresaUsuario  $empresaUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(EmpresaUsuario $empresaUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresaUsuario  $empresaUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpresaUsuario $empresaUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpresaUsuario  $empresaUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaUsuario $empresaUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaUsuario  $empresaUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresaUsuario $empresaUsuario)
    {
        //
    }
}
