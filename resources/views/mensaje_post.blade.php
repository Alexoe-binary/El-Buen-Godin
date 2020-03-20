@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
      <div class="card-header">
        <div class="container">
          <div class="row">
              <div class="col-md-10">
                <h3 class="text-left">Compania: {{$detalles->compania}}</h3>
              </div>
              <div class="col-md-2 text-rigth">
                 <a href="{{ url()->previous() }}" class="text-right">Regresar</a>
              </div>
          </div>
              <h4>{{$detalles->titulo}}</h4>
              <span>Publicado el:  {{$detalles->created_at}} Por: {{$detalles->nombre}}</span>
              <p></p>
        </div>
      </div>
      <div class="container">
          {{$detalles->mensaje}}
      </div>
  </div>
</div>
<div class="container" style="padding-top:20px">
  <h4>Te gusto el comentario</h2>
    <div class="">

    </div>
    <div class="">

    </div>
</div>

@endsection
