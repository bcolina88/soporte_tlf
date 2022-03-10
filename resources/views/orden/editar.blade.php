@extends('layout.template')
@section('title')
Editar Orden | Soporte Tec.
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Orden
        <small></small>
    </section>



@include('orden.forms.orden')




@stop