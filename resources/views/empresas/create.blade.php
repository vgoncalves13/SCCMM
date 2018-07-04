@extends('empresas.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opa!</strong> Algo de errado com os dados inseridos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form  action="{{ route('empresas.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="razao_social">Razão Social</label>
    <input type="text" class="form-control" id="razao_social" placeholder="Digite a razão social do cliente" name='razao_social'>
  </div>
  <div class="form-group">
    <label for="tipo">Tipo Empresa</label>
    <select class="form-control" id="tipo" name='tipo'>
      <option>Selecione...</option>
      <option>Privado</option>
      <option>Governo</option>
    </select>
  </div>
  
  <!-- Endereço -->
  
    <div class="form-group">
    <label for="logradouro">Logradouro</label>
    <input type="text" class="form-control" id="logradouro" placeholder="" name='logradouro'>
  </div>
    <div class="form-group">
    <label for="numero">Número</label>
    <input type="text" class="form-control" id="numero" placeholder="" name='numero'>
  </div>
    <div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" class="form-control" id="cep" placeholder="D" name='cep'>
  </div>
    <div class="form-group">
    <label for="bairro">Bairro</label>
    <input type="text" class="form-control" id="bairro" placeholder="" name='bairro'>
  </div>
    <div class="form-group">
    <label for="complemento">Complemento</label>
    <input type="text" class="form-control" id="complemento" placeholder="" name='complemento'>
  </div>
    <div class="form-group">
    <label for="cidade">Cidade</label>
    <input type="text" class="form-control" id="cidade" placeholder="" name='cidade'>
  </div>
    <div class="form-group">
    <label for="uf">UF:</label>
    <input type="text" class="form-control" id="uf" placeholder="" name='uf'>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>


@endsection