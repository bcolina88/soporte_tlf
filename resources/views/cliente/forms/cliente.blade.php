<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
     
                  <hr>
                       <div class="row">
<div class="col-md-9">
  @if ($errors->any())
    <ul>
    <div class="alert alert-warning">
  <b>Corrige Los Siguientes Errores:</b>
  @foreach ($errors->all() as $error)
  <li>
  {{$error}}
</li>
@endforeach
</div>
</ul>

@endif
</div>
</div>
                </div><!-- /.box-header -->
                <!-- form start -->               
                <form role="form">
                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                      
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Nombre</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                    </div>

                 
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Apellido</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) !!}
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Correo Electrónico</label> <span style="color: #E6674A;">*</span>
                      

                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com','required']) !!}


                    </div> 



                 
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Contraseña</label> <span style="color: #E6674A;">*</span>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>
                  
                 
                

                    <div class="col-md-4">
                    <br>
                        <label for="exampleInputPassword1">Teléfono</label> 
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '(000)-000-0000', 'data-inputmask'=>'"mask": "(999) 999-9999"','data-mask']) !!}

                  
                    </div> 


                    @if ($user2)


                          <div class="col-md-4">
                            <br>
                            <label for="exampleInputPassword1">Estado</label> 
    
                              <select class="form-control select2" id="estado" name="estado" style="width: 100%;">
                                <option value="">Seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inhactivo</option>
                              </select>
                              
                          </div>

                    @endif



                  </div><!-- /.box-body --> 
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->

                  <input type="hidden" name="tipo" id="tipo" value="{{$tipo}}">

                
                  <div class="box-footer">


                   <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>
              </form>
              </div><!-- /.box -->
          </div>

  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
@section('javascript')

<script>

   @if (Auth::user()->idrole == 3)

      $("#idrole").val(4).trigger('change');
      $("#idrole").prop('disabled',true);


   @endif

  $('[data-mask]').inputmask()




  $('.select2').select2();




  @if ($user2)
 

      $("#estado").val("{{$user2->active}}").trigger('change');
      /*$("#nombre").val("{{$user2->nombre}}").trigger('change');
      $("#apellido").val("{{$user2->apellido}}").trigger('change');
      $("#email").val("{{$user2->email}}").trigger('change');
      $("#telefono").val("{{$user2->telefono}}").trigger('change');*/



  @endif




</script>
@endsection
