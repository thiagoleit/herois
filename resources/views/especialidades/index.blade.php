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
			 <h4 class="m-0">Especialidades</h4>
		 </div>
	 </div>
	 <div class="float-right mb-2">
		 <a href="{{route('especialidade_create')}}" class="btn btn-outline-light btn-sm mt-2">Adicionar Especialidade</a>
	 </div>
	</div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td><b>Nome</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($especialidades as $especialidade)
        <tr>
            <td>{{$especialidade->nome}}</td>
						<td class="float-right"><a onclick="return confirm('Excluir Especialidade?');" href="{{route('especialidade_delete', [$especialidade->id])}}" class="btn btn-danger">Excluir</a></td>
            <td class="float-right"><a href="{{ route('especialidade_edit',$especialidade->id)}}" class="btn btn-primary">Alterar</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
