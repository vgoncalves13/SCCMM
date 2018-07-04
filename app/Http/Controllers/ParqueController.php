<?php

namespace App\Http\Controllers;

use App\Parque;
use App\Empresa;
use App\Endereco;
use Illuminate\Http\Request;

class ParqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $empresas_id = $request->empresas_id;
      $enderecos = Endereco::where('empresas_id','=',$request->empresas_id)->get();
      
      return view('parques.create',compact('empresas_id','enderecos'));
        //return view('parques.create')->with('empresas_id',$request->empresas_id);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $empresa = Empresa::find($id);
      $enderecos = Endereco::where('empresas_id','=',$id)->get();
      
      return view('empresas.show',compact('empresa','enderecos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function edit(Parque $parque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parque $parque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parque $parque)
    {
        //
    }
}
