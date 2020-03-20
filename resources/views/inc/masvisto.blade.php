@extends('layouts.app')


@section('content')
<div class="">
  <h1>Lo 10 mas Visto </h1>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Compania</th>
      <th scope="col">Anuncio</th>
      <th scope="col">Publicado</th>
      <th scope="col">Tags</th>
    </tr>
  </thead>

  @if(count($mensaje)>0)
      <tbody>
        @foreach($mensaje as $mensajes )
        <tr>
            <td>{{$mensajes->titulo }}</td>
            <td><a href="{{ url('compania_post', $mensajes->compania)}}">{{$mensajes->compania }}</a></td>
            <td><a href="{{ url('mensaje_post', $mensajes->id)}}">{{ Str::limit($mensajes->mensaje, 20, ' ...') }}</a> </td>
            <td>{{$mensajes->created_at }}</td>
            <td>Tags</td>
        </tr>
        @endforeach
      </tbody>
  @endif
</table>

@endsection
