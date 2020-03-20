@extends('layouts.app')

@section('content')
<h1>Lo mas visto</h1>
@parent
  @include('inc.topmensajes')
  @include('inc.masvisto')
@endsection
