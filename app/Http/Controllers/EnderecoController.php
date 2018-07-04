<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endereco;

class EnderecoController extends Controller
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
      
        return view('enderecos.create')->with('empresas_id',$request->empresas_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $endereco = new Endereco;
              $endereco->logradouro = $request->logradouro;
              $endereco->numero = $request->numero;
              $endereco->complemento = $request->complemento;
              $endereco->cep = $request->cep;
              $endereco->bairro = $request->bairro;
              $endereco->cidade = $request->cidade;
              $endereco->uf = $request->uf;
              $endereco->empresas_id = $request->empresas_id;

              $endereco->save();
      return redirect()->route('empresas.show', $request->empresas_id)->with('message','Novo endereço criado com sucesso');
      

        }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $endereco = Endereco::find($id);
      return view('enderecos.edit',compact('endereco','id'));
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
        //
    }
}
