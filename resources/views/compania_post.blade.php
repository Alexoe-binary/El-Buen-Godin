@extends('layouts.app')

@section('content')

<div class="jumbotron">
  <h1>Resultados para {{($resultados[0]->compania)}}</h1>
</div>
<div class="container">
  <table class="thead-dark">
    <thead>
      <tr>
        <th>Publicado Por</th>
        <th>Comentario</th>
        <th>Publicado</th>
      </tr>
    </thead>
    @foreach ($resultados as $r)
    <tbody>
      <tr>
        <td>{{$r->nombre}}</td>
        <td>{{Str::limit($r->mensaje, 20, ' ...')}}</td>
        <td>{{$r->created_at }}</td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>

@endsection
