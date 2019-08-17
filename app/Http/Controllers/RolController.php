<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Http\Request;
use HuellaPlantar\Rol;
use DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('rol')=='1') {
            $data = DB::table('rols')->get();
            return view('roles.create_rol',['data'=>$data]);
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
        if (session()->get('rol')=='1') {
            $rol = new Rol();
            $rol->nombre_rol=$request->input('nombre_rol');
            $rol->descripcion_rol=$request->input('descripcion_rol');
            $rol->estado='1';
            $rol->save();
            $data = DB::table('rols')->get();   
            return view('roles.create_rol',['data'=>$data,'mensaje'=>'Registro exitoso.','type_men'=>'1']);
        }else{
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        if (session()->get('rol')=='1') {
            $data = DB::table('rols')->where('id_rol', $id)->get();
            return $data;
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (session()->get('rol')=='1') {
            $data = DB::table('rols')->where('id_rol', $id)->get();
            return view('roles.create_rol',['data_m'=>$data]);
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
        if (session()->get('rol')=='1') {
            $now = new \DateTime();
            $fecha= $now->format('Y-m-d H:i:s');
            DB::table('rols')->where('id_rol', $id)->update(array('nombre_rol'=>$request->input('nombre_rol'),'descripcion_rol'=>$request->input('descripcion_rol'),'updated_at'=>$fecha));
            $data = DB::table('rols')->get();   
            return view('roles.create_rol',['data'=>$data,'mensaje'=>'Actualización del rol exitosa.','type_men'=>'1']);
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
        if (session()->get('rol')=='1') {
            $now = new \DateTime();
            $fecha= $now->format('Y-m-d H:i:s');
            $data=DB::table('rols')->where('id_rol', $id)->get();
            foreach ($data as $rol) {
                if($rol->estado=='1'){
                    DB::table('rols')->where('id_rol', $id)->update(array('estado'=>'0','updated_at'=>$fecha));
                    $mensaje='Rol inactivado.';
                }else{
                    DB::table('rols')->where('id_rol', $id)->update(array('estado'=>'1','updated_at'=>$fecha));
                    $mensaje='Rol activado.';
                }
            }
            $data = DB::table('rols')->get();   
            return view('roles.create_rol',['data'=>$data,'mensaje'=>$mensaje,'type_men'=>'1']);
        }else{
            return redirect('/');
        }
    }
}
