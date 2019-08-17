<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Http\Request;
use HuellaPlantar\Profesion;
use DB;

class ProfesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('rol')=='1') {
            $data = DB::table('profesions')->get();
            return view('profesiones.profesion',['data'=>$data]);
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
            $profesion = new Profesion();
            $profesion->nombre_profesion=$request->input('nombre_profesion');
            $profesion->estado='1';
            $profesion->save();
            $data = DB::table('profesions')->get();   
            return view('profesiones.profesion',['data'=>$data,'mensaje'=>'Registro exitoso.','type_men'=>'1']);
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
        $data = DB::table('profesions')->where('id_profesion', $id)->get();
        return $data;
    }

    public static function showactives()
    {
        $data = DB::table('profesions')->where('estado', '1')->get();
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
        if (session()->get('rol')=='1') {
            $data = DB::table('profesions')->where('id_profesion', $id)->get();
            return view('profesiones.profesion',['data_m'=>$data]);
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
            DB::table('profesions')->where('id_profesion', $id)->update(array('nombre_profesion'=>$request->input('nombre_profesion'),'updated_at'=>$fecha));
            $data = DB::table('profesions')->get();   
            return view('profesiones.profesion',['data'=>$data,'mensaje'=>'Actualización de la ocupación exitosa.','type_men'=>'1']);
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
            $data=DB::table('profesions')->where('id_profesion', $id)->get();
            foreach ($data as $profesion) {
                if($profesion->estado=='1'){
                    DB::table('profesions')->where('id_profesion', $id)->update(array('estado'=>'0','updated_at'=>$fecha));
                    $mensaje='Ocupación inactivada.';
                }else{
                    DB::table('profesions')->where('id_profesion', $id)->update(array('estado'=>'1','updated_at'=>$fecha));
                    $mensaje='Ocupación activada.';
                }
            }
            $data = DB::table('profesions')->get();   
            return view('profesiones.profesion',['data'=>$data,'mensaje'=>$mensaje,'type_men'=>'1']);
        }else{
            return redirect('/');
        }
    }
}
