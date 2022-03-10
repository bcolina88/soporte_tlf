<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
         
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
             
                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">



                    <div class="col-md-6 ">
           
	                    <div class="col-sm-3">
	                      {!! Form::label('id', 'Cliente:') !!} <span style="color: #E6674A;">*</span>

	                    </div>

	                    <div class="col-md-9">
	                   
	                        <select class="select2 form-control" name="cliente" id="cliente" required></select>
							<div class="btn-group">
							    <a class="btn btn-default btn-success fa fa-plus" id='btn-ingresar-cliente'></a>
							    <a class="btn btn-default btn-warning fa fa-pencil" id='btn-editar-cliente'></a>
							    <a class="btn btn-default btn-warning fa fa-search" id='btn-ver-cliente'></a>
							    
							</div>
	                    </div>
                 
      
                    </div>
        
                    <div class="col-md-12">
                      <br>
                      <hr>
                    </div>



                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Marca</label> 
                 
                
                        <select class="form-control select2" id="marca" name="marca" style="width: 100%;">

	                        <option value="0" selected="" disabled="" />Marca
							<option value="apple" />Apple
							<option value="samsung" />Samsung
							<option value="motorola" />Motorola
							<option value="sony" />Sony
							<option value="lg" />LG
	                        <option value="huawei" />Huawei
	                        <option value="nokia" />Nokia
							<option value="htc" />HTC
							<option value="alcatel" />Alcatel
							<option value="oppo" />OPPO
							<option value="blu" />BLU
							<option value="redmi" />Redmi


                        </select>




                    </div>

            

                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Modelo</label> 
                       {!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Modelo']) !!}
                    </div>




                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">IMEI</label>                  
                     {!! Form::text('serie', null, ['class' => 'form-control', 'placeholder' => 'IMEI']) !!}
                    </div>

            

                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Clave de bloqueo</label> 
                       {!! Form::text('clave_bloqueo', null, ['class' => 'form-control', 'placeholder' => 'Clave de bloqueo']) !!}
                    </div>



                    <div class="col-md-6">
                       
                       <div class="form-group">
                        <br>
                        <br>
		                <label>
		                  <label for="exampleInputPassword1">Batería</label>
		                  <input type="checkbox" name="bateria" id="bateria" class="flat-red">
		               
		                </label>
		                
		              </div>

		              <div class="form-group">
             
		                <label>
		                  <label for="exampleInputPassword1">Memoria</label>
		                  <input type="checkbox" name="memoria" id="memoria" class="flat-red">
		               
		                </label>
		                
		              </div>

		              <div class="form-group">
             
		                <label>
		                  <label for="exampleInputPassword1">Lápiz óptico</label>
		                  <input type="checkbox" name="lapiz" id="lapiz" class="flat-red">
		               
		                </label>
		                
		              </div>
		            
		          </div>

		           <div class="col-md-6">

                       <div class="form-group">
		                <br>
		                <br>
		                <label>
		                  <label for="exampleInputPassword1">Tapa</label>
		                  <input type="checkbox" name="tapa" id="tapa" value="off" class="flat-red">
		               
		                </label>
		                
		              </div>
		               <div class="form-group">
		                
		                <label>
		                  <label for="exampleInputPassword1">SIM CARD</label>
		                  <input type="checkbox" name="sin_card" id="sin_card" class="flat-red">
		               
		                </label>
		                
		              </div>
		               <div class="form-group">
		                
		                <label>
		                  <label for="exampleInputPassword1" style="color: white;">SIM CARD</label>
		                  
		               
		                </label>
		                
		              </div>
		            
		          </div>

              

                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Costo</label> 
                 
                     {!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Costo']) !!}
                    </div>


                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Garantía</label> 
                 
                     {!! Form::text('garantia', null, ['class' => 'form-control', 'placeholder' => 'Garantia']) !!}
                    </div>



                     @if ($user2)


                          <div class="col-md-6">
                            <br>
                            <label for="exampleInputPassword1">Estado</label> 
    
                              <select class="form-control select2" id="estado" name="estado" style="width: 100%;">
                                <option value="">Seleccione estado</option>
                                <option value="Sin revisar">Sin revisar</option>
                                <option value="Reparado">Reparado</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Confirmar presupuesto">Confirmar presupuesto</option>
                                <option value="Sin arreglo">Sin arreglo</option>
                     
                              </select>
                              
                          </div>

                    @endif



                    <div class="col-md-12">
                    	<br>
                         <label for="exampleInputPassword1">Diagnostico</label> <span style="color: #E6674A;">*</span>

         
				          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
				            
				                    
				             <textarea rows="6" class="form-control" name="diagnostico" id="diagnostico" required="" placeholder="Diagnostico..."></textarea>

				          </p>
				     </div>


				     <div class="col-md-12">
                    	<br>
                         <label for="exampleInputPassword1">Detalles de reparación</label> <span style="color: #E6674A;">*</span>

         
				          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
				            
				                    
				             <textarea rows="6" class="form-control" name="reparacion" id="reparacion" required="" placeholder="Detalles de reparación..."></textarea>

				          </p>
				     </div>


                  </div><!-- /.box-body --> 
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->

                  <input type="hidden" name="tipo" id="tipo" value="{{$tipo}}">

                
                  <div class="box-footer">


                   <button id="ingresar" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>
           
              </div><!-- /.box -->
          </div>





<!-- Modal Cliente-->

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_guardar_cliente" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        
        <div class="modal-header">
           <h4 class="modal-title">Agregar Cliente</h4>
        </div>
        
        <div class="modal-body">


                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                     
                    <div class="col-md-6">
                      {!! Form::label('nombre', 'Nombre') !!}
                       <input type="text" class="form-control" name="nombre_orden" id="nombre_orden" placeholder='Nombre'>
                   </div>
                  <div class="col-md-6">
                      {!! Form::label('apellido', 'Apellido') !!}
                       <input type="text" class="form-control" value="" name="apellido_orden" id="apellido_orden" required placeholder='Apellido'>

                  </div>
                    </div>


                 
                  <div class="col-md-6">        
                    <div class="form-group">
                      {!! Form::label('Correo', 'E-Mail') !!}
                      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                       <input type="email" class="form-control" value="" name="email_orden" id="email_orden" required placeholder='example@gmail.com'>

                   </div>
                  </div>
                      </div>



                      <div class="col-md-6">
                    <div class="form-group">
                      {!! Form::label('telefono', 'Teléfono') !!}
                      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                     <input type="text" class="form-control" value="" name="phone_orden" id="phone_orden"  placeholder='9-0000000' data-inputmask='"mask": "(999) 999-9999"' data-mask>

                    </div>
                    </div>

                                          
                   </div>


                    <div class="col-md-6">
                     
                      <label for="exampleInputPassword1">Contraseña</label> 
                        {!! Form::password('password_orden', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>
                  

                    </div>
                    </div>
              

           
        </div>
        <div class="col-md-12 ">
            <div id="alert_error_client" class="errorHandler alert alert-danger hide">
               <div id="text_error_cliente"></div>
            </div>
            <div id="alert_crear_client" class="successHandler alert alert-success hide">
              <i class="fa fa-ok"></i> Cliente creado!!
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-sm" id="agregar_cliente" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Guardar</button>
          <button type="button" class="btn btn-light-grey" id="salir_crear_cliente" data-dismiss="modal" style="font-size: 14px;">Salir</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_editar_cliente" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Editar Cliente</h4>
        </div>
        
        <div class="modal-body">
            
                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                     
                    <div class="col-md-6">
                      {!! Form::label('nombre', 'Nombre') !!}
                       <input type="text" class="form-control" name="nombre_orden1" id="nombre_orden1" placeholder='Nombre'>
                   </div>
                  <div class="col-md-6">
                      {!! Form::label('apellido', 'Apellido') !!}
                       <input type="text" class="form-control" value="" name="apellido_orden1" id="apellido_orden1" required placeholder='Apellido'>

                  </div>
                    </div>


                 
                  <div class="col-md-6">        
                    <div class="form-group">
                      {!! Form::label('Correo', 'E-Mail') !!}
                      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                       <input type="email" class="form-control" value="" name="email_orden1" id="email_orden1" required placeholder='example@gmail.com'>

                   </div>
                  </div>
                      </div>



                      <div class="col-md-6">
                    <div class="form-group">
                      {!! Form::label('telefono', 'Teléfono') !!}
                      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                     <input type="text" class="form-control" value="" name="phone_orden1" id="phone_orden1"  placeholder='9-0000000' data-inputmask='"mask": "(999) 999-9999"' data-mask>

                    </div>
                    </div>

                                          
                   </div>



                   <div class="col-md-6">
                      <div class="form-group">
                      {!! Form::label('estado', 'Estado') !!}
                      <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-question"></i>
                    </div>
                     {!! Form::select('estado1', ['1' => 'Activo','0' => 'Inhactivo'],null, ['class' => 'form-control']) !!} 

                    </div>
                    </div>
                    </div>


                    <div class="col-md-6">
                     
                      <label for="exampleInputPassword1">Contraseña</label> 
                        {!! Form::password('password_orden1', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>
                  

              
                
                </div>
                  
                </div>


        </div>
        <div class="col-md-12 ">
            <div id="alert_error_client_editar" class="errorHandler alert alert-danger hide">
              <div id="text_error_editar_cliente"></div>
            </div>
            <div id="alert_crear_client_editar" class="successHandler alert alert-success hide">
              <i class="fa fa-ok"></i> Cliente editado!!
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-sm" id="editar_cliente" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Editar</button>
          <button type="button" class="btn btn-light-grey" id="salir_editar_cliente" data-dismiss="modal" style="font-size: 14px;">Salir</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_ver_cliente" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Ver Cliente</h4>
        </div>
        <div class="modal-body" id="ver-cliente">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-grey" data-dismiss="modal" style="font-size: 14px;">Salir</button>

        </div>
      </div>
    </div>
  </div>
















  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
@section('javascript')

<script>

   @if (Auth::user()->idrole == 3)

      //$("#idrole").val(4).trigger('change');
      //$("#idrole").prop('disabled',true);


   @endif

  $('[data-mask]').inputmask()

  $('.select2').select2();


      CargarSelects();



  @if ($user2)

      $("#marca").val("{{$user2->marca}}").trigger('change');
      $('[name="garantia"]').val("{{$user2->garantia}}").trigger('change');
      $('[name="modelo"]').val("{{$user2->modelo}}").trigger('change');
      $('[name="serie"]').val("{{$user2->serie}}").trigger('change');
      $('[name="clave_bloqueo"]').val("{{$user2->clavebloqueo}}").trigger('change');
      $('[name="diagnostico"]').val("{{$user2->diagnostico}}").trigger('change');
      $('[name="reparacion"]').val("{{$user2->detalle}}").trigger('change');
      $('[name="valor"]').val("{{$user2->valor}}").trigger('change');
      $("#estado").val("{{$user2->estado}}").trigger('change');
     



        @if ($user2->bateria ===1)
        	document.getElementById('bateria').checked = true;
        @else
            document.getElementById('bateria').checked = false;
        @endif

        @if ($user2->memoria ===1)
        	document.getElementById('memoria').checked = true;
        @else
            document.getElementById('memoria').checked = false;
        @endif


        @if ($user2->tapa ===1)
        	document.getElementById('tapa').checked = true;
        @else
            document.getElementById('tapa').checked = false;
        @endif

        @if ($user2->lapiz ===1)
        	document.getElementById('lapiz').checked = true;
        @else
            document.getElementById('lapiz').checked = false;
        @endif


        @if ($user2->sim ===1)
        	document.getElementById('sin_card').checked = true;
        @else
            document.getElementById('sin_card').checked = false;
        @endif






  @endif




   $('#btn-ingresar-cliente').click(function(){

      

      $('#modal_guardar_cliente').modal('toggle');

    });


    $('#btn-ver-cliente').click(function(){

      if ($('#cliente').val()==="") {
          alert("Debe seleccionar un cliente");
      }else{ 

          $.ajax({
            url: "{{ route('get_cliente') }}",
            type: 'GET',
            dataType: 'json',
            data: {
              "id": $('[name="cliente"]').val()
            }
          })
          .done(function(msg) {


          	if (msg[0].active === 1) {
                var estado = "Activo";
          	}else{
                var estado = "Inhactivo";

          	};

            $('#ver-cliente').html('<section class="invoice"> <div class="row"> <div class="col-xs-12"> <h2 class="page-header"> <i class="fa fa-user"> '+msg[0].nombre+' '+msg[0].apellido+'</i> <small class="pull-right">Creado: '+msg[0].created_at+'</small> </h2> </div> </div> <div class="row invoice-info"> <div class="col-sm-6 invoice-col"> <address> <b>E-mail: </b> '+msg[0].email+' <br> <b>Teléfono:</b> '+msg[0].telefono+' <br> </address> </div> <div class="col-sm-6 invoice-col"> <address>  <b>Estado: </b> '+estado+'<br> </address> </div> </div> </section>');
            $('#modal_ver_cliente').modal('toggle'); 

          })
          .fail(function(msg) {
            console.log("error en selectClientID");
          });

      }
      
    });

    $('#btn-editar-cliente').click(function(){

      $('#alert_error_client_editar').addClass('hide');
      $('#alert_crear_client_editar').addClass('hide');


      if ($('#cliente').val()==="") {
          alert("Debe seleccionar un cliente");
      }else{ 


          $.ajax({
            url: "{{ route('get_cliente') }}",
            type: 'GET',
            dataType: 'json',
            data: {
              "id": $('[name="cliente"]').val()
            }
          })
          .done(function(msg) {

            $('[name="nombre_orden1"]').val(msg[0].nombre).trigger('change');
            $('[name="apellido_orden1"]').val(msg[0].apellido).trigger('change');
            $('[name="estado1"]').val(msg[0].active).trigger('change');
            $('[name="email_orden1"]').val(msg[0].email).trigger('change');
            $('[name="phone_orden1"]').val(msg[0].telefono).trigger('change');
       

            $('#modal_editar_cliente').modal('toggle');

          })
          .fail(function(msg) {
            console.log("error en selectClientID");
          });

      }

    });


    $('#editar_cliente').click(function(){
      var tipo = "editar";

      if ($('#cliente').val()==="") {
          alert("Debe seleccionar un cliente");
      }else{
        ClienteEditar(tipo);

      }

    });


    $('#agregar_cliente').click(function(){
      var tipo = "agregar";
      Cliente(tipo); 
    });


     $('#salir_editar_cliente').click(function(){



      $('#alert_error_client_editar').addClass('hide');
      $('#alert_crear_client_editar').addClass('hide');

      CargarSelects();


    });

    $('#salir_crear_cliente').click(function(){


      $('#alert_error_client').addClass('hide');
      $('#alert_crear_client').addClass('hide');



      $('[name="nombre_orden"]').val('');
      $('[name="apellido_orden"]').val('');
      $('[name="password_orden"]').val('');
      $('[name="phone_orden"]').val('');
      $('[name="email_orden"]').val('');

      CargarSelects();

    });













$('#ingresar').click(function(){



         if (( $('[name="nombre"]').val() ==="") ||  ($('[name="apellido"]').val() ==="")|| ($('[name="correo"]').val() ==="")|| ($('[name="empleado"]').val() ==="")|| ($('[name="diagnostico"]').val() ==="")|| ($('[name="reparacion"]').val() ==="")) {
    


            swal({
              title: 'Verifique los campos obligatorios',
              
              icon: 'warning',
              buttons: {
    
                cancel: {
                  text: "Salir",
                  value: false,
                  visible: true
                }
              }
            }).then((result) => {});






        }else{
                agregarOrden(); 
        };


  


});



function agregarOrden(){


	    var bateria = document.getElementById('bateria').checked;
        var memoria = document.getElementById('memoria').checked;
        var tapa = document.getElementById('tapa').checked;
        var lapiz = document.getElementById('lapiz').checked;
        var sin_card = document.getElementById('sin_card').checked;
        var id ="";

        @if ($user2)
           id ="{{$user2->id}}";
        @endif
  



      $.ajax({
        url: "{{ route('ordenes.store') }}",
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({ 
            "_token":         "{{ csrf_token() }}",
            "serie":           $('[name="serie"]').val(),
            "diagnostico":     $('[name="diagnostico"]').val(),
            "reparacion":      $('[name="reparacion"]').val(),
            "valor":           $('[name="valor"]').val(),
            "modelo":          $('[name="modelo"]').val(),
            "marca":           $('[name="marca"]').val(),
            "clave_bloqueo":   $('[name="clave_bloqueo"]').val(),
            "garantia":        $('[name="garantia"]').val(),
            "cliente":       $('[name="cliente"]').val(),
            "bateria":         bateria,
            "memoria":         memoria,
            "tapa":            tapa,
            "lapiz":           lapiz,
            "id":              id,
            "sin_card":        sin_card,
            "tipo":            "{{$tipo}}"
        })
      })       
      .done(function(msg) {

        if (msg === "creado") {
          var message = 'La Orden Fue Creado Correctamente';

        };

        if (msg === "editar") {
          var message = 'La Orden Fue Actualizada Correctamente';

        };

          window.location.href = "{{ route('ordenes.index') }}";

      })
      .fail(function(msg) {
            //console.log("error en createAlbarane");
      });



}

function CargarSelects(){

    $.ajax({
        url: "{{ route('all_clientes') }}",
        type: 'GET',
        dataType: 'json',
    }).done(function(msg) {

      var fila="<option></option>";
      var fila1="<option></option>";


      msg.forEach(function(item) {
         fila+="<option value="+item.id+">"+item.nombre+" "+item.apellido+"-"+item.email+"</option>";
      });

   

      $("#cliente").html(fila);


      @if ($user2)

      $("#cliente").val("{{$user2->idcliente}}").trigger('change');

     
      @endif


      

    


    }).fail(function(msg) {});

}

function ClienteEditar(tipo){


    
        $.ajax({
          url: "{{ route('edit_cliente') }}",                                          
          type: "POST",                 
          dataType: 'json',
          contentType: 'application/json',
          data: JSON.stringify({ 
            "_token":         "{{ csrf_token() }}",
            "nombre":         $('[name="nombre_orden1"]').val(),
            "apellido":       $('[name="apellido_orden1"]').val(),
            "email":          $('[name="email_orden1"]').val(),
            "telefono":       $('[name="phone_orden1"]').val(),
            "password":       $('[name="password_orden1"]').val(),
            "estado":         $('[name="estado1"]').val(),
            "tipo":           tipo,
            "id":             $('[name="cliente"]').val(),


          }),
          success: function (msg) {

              $('#alert_crear_client_editar').removeClass('hide');
              $('#alert_error_client_editar').addClass('hide');

          },
          error: function (data, textStatus, jqXHR) {

            var text='';
            
            
            if (data.responseJSON.errors.nombre) {
                for (var i = 0; i < data.responseJSON.errors.nombre.length; i++) {
                  text+='<br>'+data.responseJSON.errors.nombre[i];
                }
            }
            if (data.responseJSON.errors.email) {
                for (var i = 0; i < data.responseJSON.errors.email.length; i++) {
                  text+='<br>'+data.responseJSON.errors.email[i];
                }
            }
            if (data.responseJSON.errors.apellido) {
                for (var i = 0; i < data.responseJSON.errors.apellido.length; i++) {
                  text+='<br>'+data.responseJSON.errors.apellido[i];
                }
            }
            $('#text_error_editar_cliente').html(text);
            $('#alert_error_client_editar').removeClass('hide');
            $('#alert_crear_client_editar').addClass('hide');

          }
        });
   // }
   
        

}

function Cliente(tipo){


    
        $.ajax({
          url: "{{ route('add_cliente') }}",                                          
          type: "POST",                 
          dataType: 'json',
          contentType: 'application/json',
          data: JSON.stringify({ 
            "_token":         "{{ csrf_token() }}",
            "nombre":         $('[name="nombre_orden"]').val(),
            "apellido":       $('[name="apellido_orden"]').val(),
            "email":          $('[name="email_orden"]').val(),
            "telefono":       $('[name="phone_orden"]').val(),
            "password":       $('[name="password_orden"]').val(),
            "tipo":           tipo,



          }),
          success: function (msg) {

              $('#alert_crear_client').removeClass('hide');
              $('#alert_error_client').addClass('hide');

          },
          error: function (data, textStatus, jqXHR) {

            var text='';
            
            
               
            if (data.responseJSON.errors.nombre) {
                for (var i = 0; i < data.responseJSON.errors.nombre.length; i++) {
                  text+='<br>'+data.responseJSON.errors.nombre[i];
                }
            }
            if (data.responseJSON.errors.email) {
                for (var i = 0; i < data.responseJSON.errors.email.length; i++) {
                  text+='<br>'+data.responseJSON.errors.email[i];
                }
            }
            if (data.responseJSON.errors.apellido) {
                for (var i = 0; i < data.responseJSON.errors.apellido.length; i++) {
                  text+='<br>'+data.responseJSON.errors.apellido[i];
                }
            }
            $('#text_error_cliente').html(text);
            $('#alert_error_client').removeClass('hide');
            $('#alert_crear_client').addClass('hide');

          }
        });
   // }
   
        

}



</script>
@endsection
