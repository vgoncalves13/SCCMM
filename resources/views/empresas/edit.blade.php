@extends('empresas.layout') @section('content') @if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('empresas.update',$id) }}" method="POST">
  @csrf
  <input name="_method" type="hidden" value="PATCH">
  <div class="form-group">
    <label for="razao_social">Razão Social</label>
    <input type="text" class="form-control" id="razao_social" placeholder="Digite a razão social do cliente" name='razao_social' value={{$empresa->razao_social}}>
  </div>
  <div class="form-group">
    <label for="tipo">Tipo Empresa</label>
    <select class="form-control" id="tipo" name='tipo'>
      <option>Selecione...</option>
      <option value="Privado"@if($empresa->tipo=="Privado") selected @endif>Privado</option>
      <option value="Governo"@if($empresa->tipo=="Governo") selected @endif>Governo</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>


@endsection