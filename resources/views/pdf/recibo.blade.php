@extends('layout')
@section('css')
  <style media="screen">

    .pull-left {
        float: left !important;
    }

    .pull-right {
        float: right !important;
    }


    .table>tbody>tr>td {
        border-top: 1px solid #fff;
    }

    .table>thead>tr>th {
        border-bottom: 2px solid #fff;
    }

    .table>tbody>tr>th {
        border-bottom: 2px solid #fff;
    }


}

  </style>
@endsection

@section('content')

    <div class="col-md-12" style="font-size: 10px;line-height: 0.5">
        <div class="">
            <img src="assets/logos/logotipo.png" width="65" height="65">
            <br><br><br>
            <p><b>Steades. Inc</b></p>
            <p>274 N Moreland Blvd</p>
            <p>Waukesha, WI 53188</p>
            <p>Ph (262) 720.3975</p>
            <p>www.steades.com</p>
        </div>


    </div>
    <div class="col-md-12" style="font-size: 10px;line-height: 0.5;text-align:right;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="width: 140px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">00000</td> 
                        <td style="width: 80px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">00000</td>
                        <td style="width: 20px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;" class="text-left">
                            <p>Pay Statement</p>
                            <p>Period Star Date</p>
                            <p>Period End Date</p>
                            <p>Document</p>
                            <p>Ney Pay</p>
                        </td>
                        <td style="width: 20px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;" class="text-left">
                            <p style="color:white">00</p>
                            <p>{{$historical->fecha_inicio}}</p>
                            <p>{{$historical->fecha_fin}}</p>
                            <p style="color:white">00</p>
                            <p>$ {{number_format($historical->monto, 2, ',' , '.' )}}</p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>

    <div style="font-size: 10px;background-color:#8c8c8c">
    <p><b>Pay Detalls</b></p>
    </div>
    <div class="col-md-12" style="font-size: 10px;line-height: 0.5">
        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="width: 200px;">
                            <p>{{$historical->empleado->nombre}} {{$historical->empleado->apellido}}</p>
                            <p>{{$historical->empleado->domicilio}}</p>
                        </td>
                        <td style="width: 95px;color:white">00000</td>
                        <td style="width: 55px" class="text-left">
                            <p>Empleyee Number</p>
                            <p>SSN</p>
                            <p>Play Rate</p>
                            <p>Play Frequency</p>
                            <p>Job</p>
                        </td>
                        <td style="width: 40px" class="text-left">
                            <p>{{$historical->empleado->id}}</p>
                            <p>*****{{$ssn}}</p>
                            <p>


                                @if ($historical->timesheet_info ==="")

                                    $ {{number_format($historical->monto, 2, ',' , '.' )}}

                            
                                @else

                                    $ {{number_format($historical->empleado->pago_hora, 2, ',' , '.' )}}

                                @endif


                            </p>
                            <p>weekly</p>
                            <p>{{$historical->empleado->cargo}}</p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>
    <div style="font-size: 10px;background-color:#8c8c8c">
    <p><b>Earnings</b></p>
    </div>
    <div class="col-md-12" style="font-size: 10px;;text-align:right;line-height: 0.5;">


        <div class="">

            <table class="table" style="line-height: 0.5;">
          
                <tbody>
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5;">
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"><p>Pay Type</p></td>
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">00000</td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"><p>Hours</p></td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"><p>Pay Rate</p></td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"><p>Current</p></td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"><p>YTD</p></td>
                      
                    </tr>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5;">
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"><b>Overtime</b></td> 
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">00000</td>
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">00000oooooo</td>
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">00000oooooooooo</td>
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">00000oooooo</td>
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">00000oooooooo</td>
                    </tr>
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5;line-height: 0.5">
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"><b>Regular Pay</b></td> 
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">00000</td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5"> 


                          @if ($historical->timesheet_info ==="")
                            
                          @else

                            {{$historical->timesheet_info->timesheet->total}}

                          @endif


                    

                        </td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5;">


                                @if ($historical->timesheet_info ==="")

                                    $ {{number_format($historical->monto, 2, ',' , '.' )}}

                            
                                @else

                                    $ {{number_format($historical->empleado->pago_hora, 2, ',' , '.' )}}

                                @endif


                        </td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">$ {{number_format($historical->monto, 2, ',' , '.' )}}</td>
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;line-height: 0.5">$ {{number_format($ytd[0]->total, 2, ',' , '.' )}}</td>
                    </tr>
      
      
                </tbody>
            </table>

            
        </div>

    </div>
    <br>

    <div style="font-size: 10px;background-color:#8c8c8c">
    <p><b>Net Pay Distribuition</b></p>
    </div>

        <div class="col-md-12" style="font-size: 10px;line-height: 0.5;text-align:right">


        <div class="">

            <table class="table">
        
                <tbody style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
              
                        <td style="width: 200px;text-align:center"> <p>Account Number</p> </td> 
                        <td style="width: 100px"> <p>Account Type</p> </td> 
                        <td style="width: 50px">  <p>Amount</p> </td> 
                        <td style="width: 200px;text-align:center"> <p>Signature employee</p> </td> 

                    </tr>
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
              
                        <td style="width: 200px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;"> <p>000000</p> </td> 
                        <td style="width: 100px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;"> <b>CASH</b> </td> 
                        <td style="width: 50px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;"> <b>$ {{number_format($historical->monto, 2, ',' , '.' )}}</b> </td> 
                        <td style="width: 200px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;"> <p>000000</p> </td> 

                    </tr>
      
      
                </tbody>
            </table>

            
        </div>

    </div>
   

                        

    
@endsection