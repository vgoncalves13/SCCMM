@extends('empresas.layout') @section('content')

<form action="{{ route('enderecos.store') }}" method="POST">
  @csrf @method('POST')

  <input type="hidden" id="empresas_id" name="empresas_id" value="{{$empresas_id}}">
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