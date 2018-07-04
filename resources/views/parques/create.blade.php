@extends('empresas.layout') 

@section('content')

<form action="{{ route('enderecos.store') }}" method="POST">
  @csrf @method('POST')

  <input type="hidden" id="empresas_id" name="empresas_id" value="{{$empresas_id}}">
  <div class="form-group">
    <label for="logradouro">Nome</label>
    <input type="text" class="form-control" id="logradouro" placeholder="" name='logradouro'>
  </div>
  
  <div class="form-group">
    <label for="endereco">Endereço</label>
    <select class="form-control" id="endereco" name='endereco'>
      <option value="">Selecione...</option>
       @foreach ($enderecos as $endereco)
      <option value="{{$endereco->id}}">{{$endereco->logradouro}}{{', '}}{{$endereco->cep}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection