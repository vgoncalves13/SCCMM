<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Endereco;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::latest()->paginate(5);


        return view('empresas.index',compact('empresas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $rules = [
            'razao_social' => 'required'
        ];
       $mensagemCustomizada = ['required' => 'O campo :attribute não pode ficar em branco.'];

        $this->validate($request, $rules,$mensagemCustomizada);
      
        $empresa = new Empresa;
        $empresa->razao_social = $request->razao_social;
        $empresa->tipo = $request->tipo;
        $empresa->save();
        //Se cadastrar a empresa, procede para cadastrar o endereço
        if ($empresa) {
              $endereco = new Endereco;
              $endereco->logradouro = $request->logradouro;
              $endereco->numero = $request->numero;
              $endereco->complemento = $request->complemento;
              $endereco->cep = $request->cep;
              $endereco->bairro = $request->bairro;
              $endereco->cidade = $request->cidade;
              $endereco->uf = $request->uf;

              $empresa->enderecos()->save($endereco);

        }
        return redirect('empresas')->with('message', 'Empresa cadastrada com sucesso!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $empresa  = Empresa::find($id);
      
            return view('empresas.edit',compact('empresa','id'));
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
      $empresa = Empresa::find($id);
      $empresa->razao_social = $request->razao_social;
      $empresa->tipo = $request->tipo;
      if($empresa->save()){
        return redirect()->route('empresas.show', $id)->with('message','Empresa atualizada com sucesso');
      }
      
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empresa = Empresa::find($id);
      $empresa->delete();
      return redirect()->route('empresas.index')->with('message','Empresa deletada com sucesso');
    }
}
