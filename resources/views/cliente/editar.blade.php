@extends('layout.template')
@section('title')
Editar Cliente | Soporte Tec.
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Cliente
        <small></small>
    </section>

{!! Form::model($user2, ['route'=>['clientes.update', $user2->id], 'method'=>'PUT','enctype'=>'multipart/form-data','files'=>'true','accept-charset'=>'UTF-8']) !!}



@include('cliente.forms.cliente')


{!! Form::close() !!}

@stop