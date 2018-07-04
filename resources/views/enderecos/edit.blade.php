@extends('empresas.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form  action="{{ route('enderecos.update',$id) }}" method="POST">
  @csrf
    <input name="_method" type="hidden" value="PATCH">
  <!-- Endereço -->
  
    <div class="form-group">
    <label for="logradouro">Logradouro</label>
    <input type="text" class="form-control" id="logradouro" placeholder="" name='logradouro' value={{$endereco->logradouro}}>
  </div>
    <div class="form-group">
    <label for="numero">Número</label>
    <input type="text" class="form-control" id="numero" placeholder="" name='numero' value={{$endereco->numero}}>
  </div>
    <div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" class="form-control" id="cep" placeholder="D" name='cep' value={{$endereco->cep}}>
  </div>
    <div class="form-group">
    <label for="bairro">Bairro</label>
    <input type="text" class="form-control" id="bairro" placeholder="" name='bairro' value={{$endereco->bairro}}>
  </div>
    <div class="form-group">
    <label for="complemento">Complemento</label>
    <input type="text" class="form-control" id="complemento" placeholder="" name='complemento' value={{$endereco->complemento}}>
  </div>
    <div class="form-group">
    <label for="cidade">Cidade</label>
    <input type="text" class="form-control" id="cidade" placeholder="" name='cidade' value={{$endereco->cidade}}>
  </div>
    <div class="form-group">
    <label for="uf">UF:</label>
    <input type="text" class="form-control" id="uf" placeholder="" name='uf' value={{$endereco->uf}}>
  </div>
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>


@endsection