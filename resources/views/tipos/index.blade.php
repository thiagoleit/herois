@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

	<div class="card-header p-5 text-white bg-secondary"><div class="media float-left">
		 <div class="media-body align-self-center ml-2">
			 <h4 class="m-0">Tipos</h4>
		 </div>
	 </div>
	 <div class="float-right mb-2">
		 <a href="{{route('tipo_create')}}" class="btn btn-outline-light btn-sm mt-2">Adicionar Tipo</a>
	 </div>
	</div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td><b>Nome</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($tipos as $tipo)
        <tr>
            <td>{{$tipo->nome}}</td>
						<td class="float-right"><a onclick="return confirm('Excluir Tipo?');" href="{{route('tipo_delete', [$tipo->id])}}" class="btn btn-danger">Excluir</a></td>
            <td class="float-right"><a href="{{ route('tipo_edit',$tipo->id)}}" class="btn btn-primary">Alterar</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
