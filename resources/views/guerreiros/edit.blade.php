@extends('layout')

@section("js")
	<script>
		$(document).ready(function() {
				$('#especialidades').select2();
		});

		$('.close').click(function(){
			alert();
		  //$(this).parents('thumbnail').remove();
		});

		function remove(id){
			$('.thumbnail-'+id).remove();
		}

		$("#imagem").change(function(){
		    // $('#image_preview').html("");
		     var total_file=document.getElementById("imagem").files.length;
				 var total_image_preview=$("img").length+1;
				 alert(total_image_preview);
				 total_file	= total_image_preview + total_file;
				 alert(total_file);
				 index = 0;
		     for(var i=total_image_preview;i<total_file;i++)
		     {
		      	$('#image_preview').append("<input type='hidden' id='upload_imagem"+i+"' name='upload_imagem[]' value='"+URL.createObjectURL(event.target.files[index])+"'><div class='thumbnail-"+i+" col-3'><a class='close' onclick='remove("+i+")' href='#'>×</a><img src='"+URL.createObjectURL(event.target.files[index])+"'></div>");
						index++;
		     }
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

      <form method="post" action="{{ route('guerreiro_update', $guerreiro->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="nome">Nome:</label>
              <input required type="text" class="form-control" name="nome" value="{{ $guerreiro->nome }}"/>
          </div>
          <div class="form-group">
            <label for="especialidades">Especialidades:
              <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Você pode selecionar mais de uma especialidade.">
                <img src="/images/info-icon.png" style="pointer-events: none;" />
              </span>
            </label>
						@php $array_especialidade= array(); @endphp
						@foreach($guerreiro_especialidades as $guerreiro_especialidade)
							@php
									$array_especialidade[] = $guerreiro_especialidade->id;
							@endphp
						@endforeach
						<select required id="especialidades" name="especialidade[]" class="form-control" multiple>
							@foreach($especialidades as $especialidade)
					    	<option value="{{$especialidade->id}}"{{ in_array($especialidade->id, $array_especialidade) ? 'selected' : '' }}>{{ $especialidade->nome }}</option>
					    @endforeach
						</select>
          </div>
          <div class="form-group">
               <label for="imagem">Foto:</label>
							 <input type="file" id="imagem" name="imagem[]" multiple/>
							 <br/>
 						 	 <div id="image_preview">
								 @foreach($imagens as  $key => $imagem)
								 		<input type="hidden" id="upload_imagem{{$key}}" name="upload_imagem[]" value="{{$imagem->imagem}}">
								 		<div class="img thumbnail-{{$key}} col-3"><a class="close" onclick="remove({{$key}})" href="#">×</a><img src="{{$imagem->imagem}}"></div>
								 @endforeach
							 </div>
          </div>
          <div class="form-group">
              <label for="vida">Vida :</label>
              <input required type="text" class="form-control" value="{{ $guerreiro->vida }}" name="vida"/>
          </div>
          <div class="form-group">
              <label for="defesa">Defesa:</label>
              <input required type="text" class="form-control" value="{{ $guerreiro->defesa }}" name="defesa"/>
          </div>
          <div class="form-group">
              <label for="dano">Dano:</label>
              <input required type="text" class="form-control" value="{{ $guerreiro->dano }}" name="dano"/>
          </div>
          <div class="form-group">
              <label for="ataque">Ataque:</label>
              <input required type="text" class="form-control" value="{{ $guerreiro->ataque }}" name="ataque"/>
          </div>
          <div class="form-group">
              <label for="movimento">Movimento:</label>
              <input required type="text" class="form-control" value="{{ $guerreiro->movimento }}" name="movimento"/>
          </div>

          <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
  </div>
</div>
@endsection
