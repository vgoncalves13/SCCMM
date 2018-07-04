@extends('empresas.layout') @if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif @section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="row">
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('empresas.create') }}"> Cadastrar nova empresa</a>
      </div>
    </div>
  </div>
</div>


<div class="col-lg-12 margin-tb">
  
<div class="row">
  <table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Razão Social</th>
      <th>Tipo</th>
      <th width="280px">Ação</th>
    </tr>
    @foreach ($empresas as $empresa)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $empresa->razao_social }}</td>
      <td>{{ $empresa->tipo }}</td>
      <td>
        <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST">


          <a class="btn btn-info" href="{{ route('empresas.show',$empresa->id) }}">Exibir</a>
          <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa->id) }}">Editar</a> @csrf @method('DELETE')


          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
</div>


{!! $empresas->links() !!}
@endsection