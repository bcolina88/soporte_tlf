<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use App\Model\Historical;
use App\Model\Order;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;



class OrdenesController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */


    //private   $photos_path = "documentos";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

        $search = $request->get('search');



        if(Auth::user()->idrole ===1){


                $orders = Order::Join('users', function($f) use($search)
                    {
                        $f->on('users.id','=','orders.idcliente');
                          
                    
                    })->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('orders.modelo','LIKE','%'.$search.'%')
                      ->orWhere('orders.marca','LIKE','%'.$search.'%')
                      ->orWhere('orders.serie','LIKE','%'.$search.'%')
                      ->orWhere('orders.estado','LIKE','%'.$search.'%')
                      ->orWhere('orders.fechacreacion','LIKE','%'.$search.'%')
                      ->orderBy('orders.id','DESC')
                      ->select('orders.*')
                      ->paginate(25);



        }


        if(Auth::user()->idrole ===2){


        	$orders = Order::Join('users', function($f) use($search)
                    {
                        $f->on('orders.idcliente','=','users.id')
                          ->where('users.id','=',Auth::user()->id);
                    
                    })->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('orders.modelo','LIKE','%'.$search.'%')
                      ->orWhere('orders.marca','LIKE','%'.$search.'%')
                      ->orWhere('orders.serie','LIKE','%'.$search.'%')
                      ->orWhere('orders.estado','LIKE','%'.$search.'%')
                      ->orWhere('orders.fechacreacion','LIKE','%'.$search.'%')
                      ->orderBy('orders.id','DESC')
                      ->select('orders.*')
                      ->paginate(25);




        }



        if(Auth::user()->idrole ===3){


        	$orders = Order::Join('users', function($f) use($search)
                    {
                        $f->on('orders.idatendidopor','=','users.id')
                          ->where('users.id','=',Auth::user()->id);
                    
                    })->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('orders.modelo','LIKE','%'.$search.'%')
                      ->orWhere('orders.marca','LIKE','%'.$search.'%')
                      ->orWhere('orders.serie','LIKE','%'.$search.'%')
                      ->orWhere('orders.estado','LIKE','%'.$search.'%')
                      ->orWhere('orders.fechacreacion','LIKE','%'.$search.'%')
                      ->orderBy('orders.id','DESC')
                      ->select('orders.*')
                      ->paginate(25);





        }


 
        //return $orders;
        return view('orden.listado', compact('orders'));
  




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $user2 = [];
        $roles = User::where('idrole',3)->get();
        $tipo = "guardar";
        return view('orden.crear',compact('roles','user2','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $date = $date->format('Y-m-d');


        $data= request()->validate([
             'cliente' => 'required|integer|not_in:0',
             'diagnostico' => 'min:2|max:255|required',
             'reparacion' => 'min:2|max:255|required',
        ]);



        if($request->tipo === "guardar"){



            $user = Order::firstOrCreate([
             'idatendidopor'   => Auth::user()->id,
             'marca'           => $request->marca,
             'modelo'          => $request->modelo,
             'serie'           => $request->serie,
             'clavebloqueo'    => $request->clave_bloqueo,
             'diagnostico'     => $request->diagnostico,
             'estado'          => "Sin revisar",
             'detalle'         => $request->reparacion,
             'fechacreacion'   => $date,
             'bateria'         => $request->bateria,
             'tapa'            => $request->tapa,
             'memoria'         => $request->memoria,
             'lapiz'           => $request->lapiz,
             'sim'             => $request->sin_card,
             'garantia'        => $request->garantia,
             'valor'           => $request->valor,
             'idcliente'       => $request->cliente,
            ]);



            $user->save();

             return json_encode('creado');


        }  


        if($request->tipo === "editar"){ 



            $user = Order::find($request->id);



                    $user->fill([
			             'marca'           => $request->marca,
			             'modelo'          => $request->modelo,
			             'serie'           => $request->serie,
			             'clavebloqueo'    => $request->clave_bloqueo,
			             'diagnostico'     => $request->diagnostico,
			             'detalle'         => $request->reparacion,
			             'bateria'         => $request->bateria,
			             'tapa'            => $request->tapa,
			             'memoria'         => $request->memoria,
			             'lapiz'           => $request->lapiz,
			             'sim'             => $request->sin_card,
			             'valor'           => $request->valor,
             			 'idcliente'       => $request->cliente,
             			 'garantia'        => $request->garantia,


                    ]);



                    $user->save();



             return json_encode('editar');

         }

   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $users = Order::find($id);


        $movements = Historical::with(['empleado', 'transcriptor'])
                      ->where("historicals.idempleado", $id)
                      ->orderBy('historicals.id','DESC')       
                      ->select('historicals.*')
                      ->get();

        if(count($movements)>0){
            $ultimo_pay = $movements[0];
        }else{
            $ultimo_pay = [];
        }


        $seguro_social = explode("-", $users->seguro_social);
        $ssn = $seguro_social[2];
      



        //return $movements[1];

        return view('ordenes.detalle', compact('users','movements','ultimo_pay','ssn'));
    }


    public function profile($id)
    {


        $users = User::with(['role'])->find($id);


        $movements = Historical::with(['empleado', 'transcriptor'])
                      ->where("historicals.idempleado", $id)
                      ->orderBy('historicals.id','DESC')       
                      ->select('historicals.*')
                      ->get();

        if(count($movements)>0){
            $ultimo_pay = $movements[0];
        }else{
            $ultimo_pay = [];
        }


        $seguro_social = explode("-", $users->seguro_social);
        $ssn = $seguro_social[2];
      



        //return $movements[1];

        return view('usuario.detalle', compact('users','movements','ultimo_pay','ssn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user2 = Order::find($id);
        $roles = User::where('idrole',3)->get();
        $tipo = "editar";

        return view('orden.editar', compact('user2','roles','tipo'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
        session::flash('message','La Orden Fue Eliminada Correctamente');
        return redirect(route('ordenes.index')); 
    }



    
}
