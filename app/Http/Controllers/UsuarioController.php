<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use HuellaPlantar\Usuario;
use DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('id')) {
            $users = DB::table('usuarios')->where('id_usuario', session()->get('id'))->get();
            return view('usuarios.perfil',['users'=>$users]);
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->num_iden=$request->input('num_iden');
        $usuario->nombres=$request->input('nombres');
        $usuario->apellidos=$request->input('apellidos');
        $usuario->email=$request->input('email');
        $usuario->password=Hash::make($request->input('password'));
        $usuario->telefono=$request->input('telefono');
        $usuario->direccion=$request->input('direccion');
        $usuario->fech_nacimiento=$request->input('fech_nacimiento');
        $usuario->id_rol='4';
        $usuario->id_deporte=$request->input('id_deporte');
        $usuario->id_cat_dep=$request->input('id_cat_dep');
        $usuario->id_profesion=$request->input('id_profesion');
        $usuario->peso=$request->input('peso');
        $usuario->estatura=$request->input('estatura');
        $usuario->enfermedades=$request->input('enfermedades');
        $usuario->alergias=$request->input('alergias');
        $usuario->save();
        return view('usuarios.gracias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public static function show($id)
    {
        $data = DB::table('usuarios')->where('id_usuario', $id)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (session()->has('id')) {
            $users = DB::table('usuarios')->where('id_usuario', $id)->get();
            return view('usuarios.update-dates',['data'=>$users]);
        }else{
            return redirect('/');
        }  
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
        if (session()->has('id')) {
            $now = new \DateTime();
            $fecha= $now->format('Y-m-d H:i:s');
            $users = DB::table('usuarios')->where('id_usuario', $id)->get();
            foreach ($users as $user){
                if(Hash::check($request->input('password'), $user->password)){
                    DB::table('usuarios')->where('id_usuario', $id)->update(array('nombres'=>$request->input('nombres'),'apellidos'=>$request->input('apellidos'),'email'=>$request->input('email'),'telefono'=>$request->input('telefono'),'direccion'=>$request->input('direccion'),'fech_nacimiento'=>$request->input('fech_nacimiento'),'id_deporte'=>$request->input('id_deporte'),'id_cat_dep'=>$request->input('id_cat_dep'),'id_profesion'=>$request->input('id_profesion'),'peso'=>$request->input('peso'),'estatura'=>$request->input('estatura'),'enfermedades'=>$request->input('enfermedades'),'alergias'=>$request->input('alergias'),'updated_at'=>$fecha));
                    $users = DB::table('usuarios')->where('id_usuario', session()->get('id'))->get();
                    return view('usuarios.update-dates',['data'=>$users,'mensaje'=>'Datos Actualizados Correctamente.','typemen'=>'1']);
                }else{
                    return view('usuarios.update-dates',['data'=>$users,'mensaje'=>'La contraseña no coincide. Por favor verifique la contraseña y actualice nuevamente los datos.','typemen'=>'0']);
                }
            }
        }else{
            return redirect('/');
        }

    }

    public function update_pass(Request $request)
    {
        if (session()->has('id')) {
            $now = new \DateTime();
            $fecha= $now->format('Y-m-d H:i:s');
            $users = DB::table('usuarios')->where('id_usuario', session()->get('id'))->get();
            foreach ($users as $user){
                if(Hash::check($request->input('password'), $user->password)){
                    if($request->input('n_password')==$request->input('vn_password')){
                        DB::table('usuarios')->where('id_usuario', session()->get('id'))->update(array('password'=>Hash::make($request->input('n_password'))));
                        return view('usuarios.update-pass',['mensaje'=>'Contraseña Modificada Correctamente.','typemen'=>'1']);
                    }else{
                        return view('usuarios.update-pass',['mensaje'=>'La Nueva Contraseña no Coincide con la Verificación.','typemen'=>'0']);
                    }

                } else{
                    return view('usuarios.update-pass',['mensaje'=>'La Contraseña Anterior no Coincide.','typemen'=>'0']);
                }   
            }
        }else{
            return redirect('/');
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
        //
    }
}
