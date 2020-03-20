@extends('layouts.app')

@section('content')


<div class="card">
  <div class="card-body">
    <div class="card-header">
      <h3>Que sucedio </h3>
    </div>
    <span>*Campos obligatorios a llenar</span>
    <div class="container"style="padding-top: 15px;">
      {!! Form::open(['url' => 'mensajes/enviar','files' => true,'enctype'=>'multipart/data']) !!}
        <div class="form-group" style="width: 300px">
          <?php echo Form::label('nombre', 'Nombre'); ?>
          <?php echo Form::text('nombre','',['class'=>'form-control','placeholder'=>'Tu Nombre']) ?>
        </div>
        <div class="form-group" style="width: 300px">
          <?php echo Form::label('titulo', '*Titulo'); ?>
          <?php echo Form::text('titulo','',['class'=>'form-control','placeholder'=>'Titulo del Anuncio']) ?>
        </div>
        <div class="form-group" style="width: 300px">
          <?php echo Form::label('categoria', '*Categoria'); ?>
          <?php echo Form::select('categorias', $categorias, array('class' => 'form-control')) ?>
        </div>
              <div class="form-group" style="width: 300px">
          <?php echo Form::label('compania', 'Compañia'); ?>
          <?php echo Form::text('compania','',['class'=>'form-control','placeholder'=>'Nombre de la Compania']) ?>
        </div>
        <div class="form-group">
          <?php echo Form::label('mensaje', '*Comentario'); ?>
          <?php echo Form::textarea('mensaje','',['class'=>'form-control','placeholder'=>'
          Escribe que sucede, que te paso, que viste, en tu trabajo']) ?>
        </div>
        <div class="form-group" style="width: 200px">
          {{ Form::label('fecha','*Fecha en que sucedio')}}
          {{ Form::text('date', '', array('class'=>'input-group date','id' => 'datepicker','placeholder'=>'dd/mm/aaaa')) }}
        </div>
        <div class="form-group">
          {{Form::label('archivo','Subir un archivo?')}}
          {{Form::file('archivo')}}
        </div>
        <div >
          <?php echo Form::submit('Enviar',['class'=>'btn btn-primary']) ?>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection
