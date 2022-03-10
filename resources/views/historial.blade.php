@extends('layout.template')
@section('title')
Historial e informes | Steades
@endsection
@section('content')

   <section class="content-header">
      <h1>
        Historial e informes
        <small></small>
    </section>


    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">

            <br>
   



            <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cliente">Empleado </label> <span style="color: #E6674A;">*</span>
                                  <select class="select2 form-control" id="empleado" name="empleado" required>
                                      <option value="">Seleccione empleado</option>
                                       @foreach ($empleados as $value)
                                            <option value="{{$value->id}}">{{$value->apellido}}, {{$value->nombre}} {{$value->segundo_nombre}} </option>
                                        @endforeach
                                 
                                          
                                   </select>
              
                               
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Período de trabajo</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-default pull-right" id="daterange-btn" name="inp-periodo">
                                        <span>
                                            
                                        </span>
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Período seleccionado</label>
                                <p id="pperiodo" style="margin-top:7px;"></p>
                                <input type="hidden" id="periodo" name="periodo" value="">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <br>
                                <div class="input-group">
                                    <button id="search" class="btn btn-primary pull-right" style="margin-left:10px;">
                                        BUSCAR
                                    </button>
                                </div>
                            </div>
                        </div>
            </div>

            <br>
            <span style="color: #E6674A;">*</span> Campos Obligatorios
 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="tabla" class="table no-margin table-striped  table-hover">
                  <thead>
                  <tr>

                    <th>Empleado</th>
                    <th>Transcriptor</th>
                    <th>Monto</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Fecha de transacción</th>
                    <th>Acciones</th>
              
                  </tr>
                  </thead>
                   <tbody>
                              <tr><td colspan="7" style="text-align: center;">Recibos de pago realizados</td></tr>
                     
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td> 
                                        <td></td> 
                                        <td></td> 
                                        <td></td> 
                                        <td></td> 
                                  
                                    </tr>
                          
                    </tbody>
                    

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
  

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop


@section('javascript')

<script type="text/javascript">
  $('.select2').select2();

  @if (session('mensage'))
  $(".callout").fadeTo(5000, 500).slideUp(500, function(){
     $(".callout").slideUp(500);
  });
  @endif

    @if (Auth::user()->idrole == 4)

        $('#empleado').val("{{Auth::user()->id}}").trigger('change');;
        $("#empleado").prop('disabled',true);


    @endif

  $(function () {    
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
            locale: {
                format: 'YYYY/MM/DD',
                daysOfWeek: [
                    "DOM",
                    "LUN",
                    "MAR",
                    "MIR",
                    "JUE",
                    "VIE",
                    "SAB"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
            },
            ranges: {
               
                'Hace 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Hace 30 Dias': [moment().subtract(29, 'days'), moment()],
                'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            
            var periodo = start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD');
            
            $('#daterange-btn span').html(periodo);
            $('[name=periodo]').val(periodo);
            $('p#pperiodo').text(periodo);
        }
    );


    $("#search").click(function (event) {
        event.preventDefault();

        var arti=false;
        var peri=false;


        if ($('#empleado').val()==="") {
            //alert("Debe seleccionar un empleado");


            swal({
              title: 'Debe seleccionar un empleado',
              
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
            arti=true;
        };

        if ($('#periodo').val()==="") {
            //alert("Debe seleccionar un Período de Movimiento");


             swal({
              title: 'Debe seleccionar un Período de Trabajo',
              
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
            peri=true;
        };


        if((arti)&&(peri)){

      
            var empleado = ($("#empleado").val() == "") ? "all" : $("#empleado").val();
            var periodo = $("#periodo").val().split(" - ");
            var desde   = periodo[0].split("/");
            var hasta   = periodo[1].split("/");
            desde       = desde[0] + "-" + desde[1] + "-" + desde[2];
            hasta       = hasta[0] + "-" + hasta[1] + "-" + hasta[2];  
            periodo     = desde + " - " + hasta;



            $.ajax({
                url: "{{ route('search_article') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                  "empleado": empleado,
                  "periodo" : periodo,
                }
            })
            .done(function(data) {

                    var movimientos = data.movements;

            console.log(movimientos)
                    


         

                    var res = {};
                    var result = [];
                    var template = "<tr><td>:empleado:</td><td>:transcriptor:</td><td>:monto:</td><td>:fecha_inicio:</td><td>:fecha_fin:</td><td>:fecha_t:</td> <td> <a href=':ruta:' class='btn btn-info fa fa-file-pdf-o'><b></b></a> </td> </tr>"; 

                    var $tbody   = $("#tabla").find("tbody");
                    $tbody.html("");

                    if(movimientos.length > 0) {

             
                        
                            $.each(movimientos, function (index, movimiento) {

                             
            
                                var row = template.replace(":empleado:",movimiento.empleado.apellido+', '+movimiento.empleado.nombre+' '+movimiento.empleado.segundo_nombre)
                                    .replace(":transcriptor:",movimiento.transcriptor.nombre+' '+movimiento.transcriptor.apellido)
                                    .replace(":monto:",parseFloat(movimiento.monto).toFixed(2))
                                    .replace(":fecha_inicio:",movimiento.fecha_inicio)
                                    .replace(":fecha_fin:",movimiento.fecha_fin)
                                    .replace(":fecha_t:",movimiento.created_at)
                                    .replace(":ruta:","descargar/"+movimiento.id);
            
                                $tbody.append(row);
                            });


                    } else {
                        $tbody.append("<tr><td colspan='7' style='text-align: center;'>No hay recibos de pagos  en el tiempo especificado</td></tr>");
                    }

         

            })
            .fail(function(msg) {
                console.log("error");
            });

        }
        
    });

  


});

</script>
@endsection