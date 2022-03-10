@extends('layout.template')
@section('title')
Editar rol | Soporte Tec.
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar rol
        <small></small>
    </section>

 {!! Form::model($role, ['route'=>['roles.update', $role->id], 'method'=>'PUT']) !!}
@include('roles.forms.role')


{!! Form::close() !!}

@stop