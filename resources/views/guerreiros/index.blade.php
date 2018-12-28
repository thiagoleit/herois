@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .guerreiro-card {
    width: 31%;
    margin-left: 20px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

	<div class="my-5 row no-gutters">
		<div class="container">
		<div class="col-12 page-content">

      <div class="card-header p-5 text-white bg-secondary"><div class="media float-left">
         <div class="media-body align-self-center ml-2">
           <h4 class="m-0">Nossos Guerreiros</h4>
         </div>
       </div>
       <div class="float-right mb-2">
         <a href="{{route('guerreiro_create')}}" class="btn btn-outline-light btn-sm mt-2">Adicionar Guerreiro</a>
       </div>
      </div>
          <hr class="my-2">
				  @if(count($guerreiros))
    				<div class="row">
    					@foreach($guerreiros as $guerreiro)
                <div class="p-0 mb-5 card flex guerreiro-card text-center">
                  <div id="carouselControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      @foreach($guerreiro->imagens($guerreiro->id) as $imagem )
                      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{$imagem->imagem}}" alt="First slide">
                      </div>
                      @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

                <div class="card-body p-1">
    								<h5 class="card-title p-2 text-secondary">{{ $guerreiro->nome }}</h5>
                  </div>
                  <div class="card-body p-1">
                    @php
                      $esp_array = array();
                      foreach($guerreiro->especialidades as $especialidade){
                        $esp_array[] = $especialidade->nome;
                      }
                      $especialidades = '<br>'. implode(",<br> ", $esp_array);
                    @endphp
                  	<div class="row btn-group mb-3">
											<p class="card-text"><strong>Especialidade:</strong> {!!$especialidades!!}</p>
										</div>

    								<div class="card-body p-0">
                      <p class="card-text">
                        <span class="m-2"><strong>Vida:</strong> {{$guerreiro->vida}} </span></span>
  											<span class="m-2"><strong>Defesa:</strong> {{$guerreiro->defesa}}</span>
  											<span class="m-2"><strong>Dano:</strong> {{$guerreiro->dano}}</span>
                      </p>
                      <p class="card-text p-0"><strong>Ataque:</strong> {{$guerreiro->ataque}}</p>
                      <p class="card-text"><strong>Movimento:</strong> {{$guerreiro->movimento}}</p>

    								</div>
                    <div class="row p-2">
                      <div class="card-body p-0">
                        <p class="card-text">

                          <a href="{{route('guerreiro_edit', [$guerreiro->id])}}" class="col-4 btn-outline-primary btn btn-sm card-link">Alterar</a>
                          <a onclick="return confirm('Excluir Guerreiro?');" href="{{route('guerreiro_delete', [$guerreiro->id])}}" class="col-4 btn-outline-primary btn btn-sm card-link">Excluir</a>
                        </p>
                      </div>
                    </div>
    							</div>
    						</div>
    					@endforeach
    				</div>
    			@else
    				<p>Nenhum Guerreiro Encontrado</p>
    			@endif
    		</div>
    	</div>
  	</div>
	</div>
@endsection
