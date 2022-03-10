@extends('layout.template')
@section('title')
Detalle de Usuario | Soporte Tec.
@endsection
@section('content')


  <section class="content">
    <!-- Main content -->
    <section class="invoice">
    	    <!-- title row -->
          @if (Session::has('message'))
 <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
@endif


       <div class="col-md-12">
          <!-- Widget: user widget style 1 -->



                  <!-- ./col -->
                  <div class="col-md-12 small-box bg-aqua">
                    <!-- small box -->

                      <div class="inner">
                         <div class="widget-user-header bg-aqua">
                        <!--<div class="widget-user-image image">
                          <img class="img-circle responsive" src="../dist/img/Sin_foto.png" alt="User Avatar">
                        </div>-->
                        <br><br><br><br>
                        <!-- /.widget-user-image -->
                        <span class="widget-user-username" style="font-size: 40px"> <b>{{$users->nombre}} {{$users->apellido}}  </b></span>
                        <br><br>
                      </div>

                        <p><b>Dirección</b></p>
                        <p>

                           @if($users->domicilio == null) N/D @else {{$users->domicilio}} @endif

                        </p>
                        <br>

                        <div class="pull-left">
                          <p><b>Email</b></p>
                          <p>{{$users->email}}</p>


                          <p><b>Telefono</b></p>
                          <p>

                            @if($users->telefono == null) N/D @else {{$users->telefono}} @endif
                          
                          </p>



                        </div>

                        <div class="pull-right">
                          <p><b>F. nacimiento</b></p>
                          <p>

                            @if($users->fecha_nacimiento == null) N/D @else {{$users->fecha_nacimiento}} @endif

                          </p>


                          <p><b>F. contrato</b></p>
                          <p>

                             @if($users->fecha_contrato == null) N/D @else {{$users->fecha_contrato}} @endif

                          </p>



                        </div>




                        <br><br><br>


                      </div>



                  </div>


                  <!-- ./col -->

                  <!-- ./col -->

         
        </div>


     

       
        <div class="box-body">

            @if ((Auth::user()->idrole != 3)&&(Auth::user()->idrole != 2))


            <a href="{{route('usuarios.index')}}" class="btn btn-default  btn-flat pull-right"><b>Regresar listado de usuarios</b></a>
            
            @endif

        </div>
       


  


</section>

</section>


@stop