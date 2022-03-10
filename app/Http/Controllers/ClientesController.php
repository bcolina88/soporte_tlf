<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use App\Model\Historical;
use DB;
use Session;


class ClientesController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */


    private   $photos_path = "documentos";

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

        $users = User::Join('roles', function($f) use($search)
                    {
                        $f->on('roles.id','=','users.idrole')
                          ->orWhere('roles.id','=',2);
                    
                    })->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('users.email','LIKE','%'.$search.'%')
                      ->orWhere('users.telefono','LIKE','%'.$search.'%')
                      ->orWhere('users.id','LIKE','%'.$search.'%')
                      ->orderBy('users.id','DESC')
                      ->select('users.*')
                      ->paginate(25);

        return view('cliente.listado', compact('users'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $users = User::with(['role'])->find($id);
        return view('usuario.detalle', compact('users'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user2 = User::with(['role'])->find($id);
        $tipo = "editar";

        return view('cliente.editar', compact('user2','tipo'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data= request()->validate([
            'nombre' => 'min:4|max:255|required',
            'apellido' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,'.$id,
            'password' => ''

        ]);




        if($request->tipo === "editar"){ 


                        
                        
                        if($request->password  != null){

                            $pass = bcrypt($request->password);
                            $user = User::with(['role'])->find($id);

                            $user->fill([
                             'nombre'          => $request->nombre,
                             'apellido'        => $request->apellido,
                             'password'        => $pass,
                             'active'          => $request->estado,
                             'telefono'        => $request->telefono,
                             'email'           => $request->email,

                             

                            ]);


                            $user->save();

                            session::flash('message','El cliente Fue Actualizado Correctamente');
                            return redirect(route('clientes.index')); 


         
                        } else {

                            $user = User::with(['role'])->find($id);

                            $user->fill([
                             'nombre'          => $request->nombre,
                             'apellido'        => $request->apellido,
                             'active'          => $request->estado,
                             'telefono'        => $request->telefono,
                             'email'           => $request->email,

                            ]);


                            $user->save();

                            session::flash('message','El cliente Fue Actualizado Correctamente');
                            return redirect(route('clientes.index')); 
                           
                        }


        }


         
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }


     /**
     * Activa al usuario modificando su estatus
     */
    public function activate($id)
    {
        $employee = User::where('id', $id)->first();

        $employee->active = 1;
        $employee->save();


        return redirect(route('clientes.index')); 

    }

    /**
     * desactiva al usuario modificando su estatus
     */
    public function deactivate($id)
    {
        $employee = User::where('id', $id)->first();


        $employee->active = 0;
        $employee->save();

        return redirect(route('clientes.index')); 
    }



    
}
