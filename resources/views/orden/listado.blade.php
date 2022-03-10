@extends('layout.template')
@section('title')
Listado de Ordenes | Soporte Tec.
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Listado de Ordenes
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

            {!!Form::open(['route'=>'ordenes.index', 'method'=>'GET'])!!}
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
                    <th>Orden</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>IMEI</th>
                    <th>Estado</th>
                    @if (Auth::user()->idrole != 3)
                    <th>Acciones</th>
                      @endif  
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($orders as $key => $user)
                  <tr>

                    <td>#{{$user->id}}</td>
                    <td>{{$user->fechacreacion }}</td>
                    <td>{{$user->cliente->nombre }}, {{$user->cliente->apellido}} </td>
                    <td>{{$user->marca}}</td>
                    <td>{{$user->modelo}}</td>
                    <td>{{$user->serie}}</td>
                    <td>{{$user->estado}}</td>
                     
                     <td>
                    
                      <div class="btn-group">
          
                          {!! Form::model($user, ['route'=>['ordenes.update', $user->id], 'method'=>'DELETE']) !!}

                          <a class="btn btn-default btn-success fa fa-search" onclick="ver({{$user->id}});"><b></b></a> 
                          
                          @if (\App\Http\Controllers\RolesController::editar(2))
                          <a href="{{route("ordenes.edit", ['id' => $user->id])}}" onclick="return confirm('Seguro que Desea Editar la Orden #{{$user->id}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
                          @endif


                          @if (\App\Http\Controllers\RolesController::borrar(2))

                          <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar la Orden #{{$user->id}}')" ></i></button>
                          
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

              @if (\App\Http\Controllers\RolesController::agregar(2))
                <a href="{{route('ordenes.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nueva Orden</b></a> 
              @endif

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $orders->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->


          	<div class="modal fade" tabindex="-1" role="dialog" id="modal_ver_cliente" data-keyboard="false" data-backdrop="static">
			    <div class="modal-dialog modal-lg" role="document">
			      <div class="modal-content">
			        <div class="modal-header">
			           <h4 class="modal-title">Ver Orden</h4>
			        </div>
			        <div class="modal-body" id="ver-cliente">
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-light-grey" data-dismiss="modal" style="font-size: 14px;">Salir</button>

			        </div>
			      </div>
			    </div>
			  </div>






  </section>


@stop

@section('javascript')

<script>

function ver(id){


	     $.ajax({
            url: "{{ route('get_orden') }}",
            type: 'GET',
            dataType: 'json',
            data: {
              "id": id
            }
          })
          .done(function(msg) {

          	var tapa,sim,bateria,memoria,lapiz;
       


          	if (msg[0].tapa ===0) {tapa = "No"; }else{tapa = "Si";};
          	if (msg[0].sim ===0) {sim = "No"; }else{sim = "Si";};
          	if (msg[0].bateria ===0) {bateria = "No"; }else{bateria = "Si";};
          	if (msg[0].memoria ===0) {memoria = "No"; }else{memoria = "Si";};
          	if (msg[0].lapiz ===0) {lapiz = "No"; }else{lapiz = "Si";};


       
            $('#ver-cliente').html('<section class="invoice"> <div class="row"> <div class="col-xs-12"> <h2 class="page-header"> <i class="fa fa-wrench"> Orden #'+msg[0].id+'</i> <small class="pull-right">Creado: '+msg[0].created_at+'</small> </h2> </div> </div> <div class="row invoice-info"> <div class="col-sm-6 invoice-col"> <address> <b>Cliente:</b>  '+msg[0].cliente.nombre+' '+msg[0].cliente.apellido+'<br> <b>Email de cliente: </b> '+msg[0].cliente.email+' <br> <hr> <h4> Datos del Teléfono: </h4> <b>Marca: </b> '+msg[0].marca+' <br> <b>Modelo:</b> '+msg[0].modelo+' <br> <hr> <h4> Accesorios:</h4> <b>Batería:</b> '+bateria+' <br><b>Memoria:</b> '+memoria+' <br><b>Lápiz óptico:</b> '+lapiz+' <br> <hr> <b>Costo:</b> '+msg[0].valor+' <hr> <b>Diagnostico:</b> '+msg[0].diagnostico+'</address> </div> <div class="col-sm-6 invoice-col"> <address>  <b>Estado: </b> '+msg[0].estado+'<br> <b>Atendido por: </b> '+msg[0].atendidopor.nombre+' '+msg[0].atendidopor.apellido+' <br> <hr> <h4 style="color:white;">nada</h4><b>IMEI: </b> '+msg[0].serie+' <br> <b>Clave de bloqueo:</b> '+msg[0].clavebloqueo+' <br> </address> <hr><h4 style="color:white;">nada</h4> <b>Tapa:</b> '+tapa+'<br><b>SIM CARD:</b> '+sim+' <br> <br><hr> <b>Garantía:</b> '+msg[0].garantia+' <hr> <b>Detalles de reparación:</b> '+msg[0].detalle+'</div> </div> </section>');
            $('#modal_ver_cliente').modal('toggle'); 

          })
          .fail(function(msg) {
            console.log("error en selectClientID");
          });
     

}



</script>
@endsection