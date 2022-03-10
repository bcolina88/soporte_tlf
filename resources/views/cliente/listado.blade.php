@extends('layout.template')
@section('title')
Listado de Clientes | Soporte Tec.
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Listado de Clientes
        <small></small>
    </section>


    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">

            <br>
            @if (Session::has('message'))
             <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
            @endif

            {!!Form::open(['route'=>'clientes.index', 'method'=>'GET'])!!}
            <div class="input-group">

                      <input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar..."/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>

            </div>
            {!!Form::close()!!}
 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-striped  table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Estado</th>

                    @if (Auth::user()->idrole != 3)
                    <th>Acciones</th>
                      @endif  
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $key => $user)
                  <tr>

                  
                    <td>#{{$user->id}}</td>
                    <td>{{$user->nombre}} </td>
                    <td>{{$user->apellido}}</td>
          
                    <td>{{$user->email}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>

                        @if($user->active)
                          <p class="text-green">Activo</p>
                        @else
                          <p class="text-red">Inhactivo</p>
                        @endif


                    </td>
       
    
                     
                     <td>
                    
                      <div class="btn-group">
          
      
                          @if (\App\Http\Controllers\RolesController::editar(2))
                          <a href="{{route("clientes.edit", ['id' => $user->id])}}" onclick="return confirm('Seguro que Desea Editar el cliente #{{$user->id}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
                          @endif


                          @if ($user->active == 1)
			              <a href="{{route("clientes.deactivate", ['id' => $user->id])}}" onclick="return confirm('Seguro que Desea Deshabilitar a {{$user->nombre}} {{$user->apellido}}')" class="btn btn-default btn-primary fa fa-toggle-on" data-toggle="tooltip" data-placement="top" title="Deshabilitar"><b></b></a> 
			              @endif


			               @if ($user->active == 0)
			              <a href="{{route("clientes.activate", ['id' => $user->id])}}" onclick="return confirm('Seguro que Desea Habilitar a {{$user->nombre}} {{$user->apellido}}')" class="btn btn-default btn-primary fa fa-toggle-off" data-toggle="tooltip" data-placement="top" title="Habilitar"><b></b></a> 
			              @endif




                          {!! Form::close() !!}

                      </div>
                                    
                      </td>
                     
                  </tr>
                     @empty

                  No hay Datos que Mostrar.
                    @endforelse


                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

           

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $users->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop