@extends('layout')

@section("js")
	<script>
		$(document).ready(function() {
				$('#especialidades').select2();
		});
  </script>
@endsection

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Guerreiro
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

      <form method="post" action="{{ route('guerreiro_store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="nome">Nome:</label>
              <input required type="text" class="form-control" name="nome" value="{{ old('nome') }}"/>
          </div>
          <div class="form-group">
            <label for="especialidades">Especialidades:
              <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Você pode selecionar mais de uma especialidade.">
                <img src="/images/info-icon.png" style="pointer-events: none;" />
              </span>
            </label>
						<select required id="especialidades" name="especialidade[]" class="form-control" multiple>
							@foreach($especialidades as $especialidade)
					    	<option value="{{$especialidade->id}}">{{ $especialidade->nome }}</option>
					    @endforeach
						</select>
          </div>
          <div class="form-group">
              <label for="imagem">Foto:</label>
							<input required type="file" class="form-control" placeholder="adicionar imagens" id="imagem" accept="image/*"  name="imagem[]" multiple>
          </div>
          <div class="form-group">
              <label for="vida">Vida :</label>
              <input required type="text" class="form-control" value="{{ old('vida') }}" name="vida"/>
          </div>
          <div class="form-group">
              <label for="defesa">Defesa:</label>
              <input required type="text" class="form-control" value="{{ old('defesa') }}" name="defesa"/>
          </div>
          <div class="form-group">
              <label for="dano">Dano:</label>
              <input required type="text" class="form-control" value="{{ old('dano') }}" name="dano"/>
          </div>
          <div class="form-group">
              <label for="ataque">Ataque:</label>
              <input required type="text" class="form-control" value="{{ old('ataque') }}" name="ataque"/>
          </div>
          <div class="form-group">
              <label for="movimento">Movimento:</label>
              <input required type="text" class="form-control" value="{{ old('movimento') }}" name="movimento"/>
          </div>

          <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
  </div>
</div>
@endsection
