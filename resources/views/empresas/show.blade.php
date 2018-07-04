@extends('empresas.layout') @section('content')
     @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
     @endif
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2> Mostrar Empresa</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Voltar</a>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Razão Social:</strong> {{ $empresa->razao_social }}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Tipo:</strong> {{ $empresa->tipo }}
    </div>
  </div>
  <form action="{{ route('enderecos.create') }}" method="POST">
    <input type="hidden" id="empresas_id" name="empresas_id" value="{{$empresa->id}}"> @csrf @method('POST')
    <button type="submit" class="btn btn-primary">Adicionar novo endereço</button>
  </form>
  <form action="{{ route('parques.create') }}" method="POST">
    <input type="hidden" name="empresas_id" value="{{$empresa->id}}"> @csrf @method('POST')
    <button type="submit" class="btn btn-primary">Adicionar novo parque</button>
  </form>
  <table class="table table-bordered">
    <tr>
      <th>Logradouro</th>
      <th>Número</th>
      <th>Complemento</th>
      <th>CEP</th>
      <th>Bairro</th>
      <th>Cidade</th>
      <th>UF</th>
      <th width="280px">Ação</th>
    </tr>
    @foreach ($enderecos as $endereco)
    <td>{{ $endereco->logradouro }}</td>
    <td>{{ $endereco->numero }}</td>
    <td>{{ $endereco->complemento }}</td>
    <td>{{ $endereco->cep }}</td>
    <td>{{ $endereco->bairro }}</td>
    <td>{{ $endereco->cidade }}</td>
    <td>{{ $endereco->uf }}</td>
    <td>

      <form action="{{ route('enderecos.destroy',$endereco->id) }}" method="POST">

        <a class="btn btn-primary" href="{{ route('enderecos.edit',$endereco->id) }}">Editar</a> @csrf @method('DELETE')


        <button type="submit" class="btn btn-danger">Deletar</button>
      </form>
    </td>

    </tr>
    @endforeach

  </table>

</div>
@endsection