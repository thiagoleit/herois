@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Alterar Especialidade
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('especialidade_update', $especialidade->id) }}">
        @csrf
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" name="nome" value={{ $especialidade->nome }} />
        </div>
        <button type="submit" class="btn btn-primary">Alterar</button>
      </form>
  </div>
</div>
@endsection
