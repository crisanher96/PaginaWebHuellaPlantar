<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Http\Request;
use HuellaPlantar\Deporte;
use DB;

class DeporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('rol')=='1') {
            $data = DB::table('deportes')->get();
            return view('deportes.deporte',['data'=>$data]);
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
            $deporte = new Deporte();
            $deporte->nombre_deporte=$request->input('nombre_deporte');
            $deporte->estado='1';
            $deporte->save();
            $data = DB::table('deportes')->get();   
            return view('deportes.deporte',['data'=>$data,'mensaje'=>'Registro exitoso.','type_men'=>'1']);
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
        $data = DB::table('deportes')->where('id_deporte', $id)->get();
        return $data;
    }

    public static function showactives()
    {
        $data = DB::table('deportes')->where('estado', '1')->get();
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
            $data = DB::table('deportes')->where('id_deporte', $id)->get();
            return view('deportes.deporte',['data_m'=>$data]);
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
            DB::table('deportes')->where('id_deporte', $id)->update(array('nombre_deporte'=>$request->input('nombre_deporte'),'updated_at'=>$fecha));
            $data = DB::table('deportes')->get();   
            return view('deportes.deporte',['data'=>$data,'mensaje'=>'Actualización del deporte exitosa.','type_men'=>'1']);
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
            $data=DB::table('deportes')->where('id_deporte', $id)->get();
            foreach ($data as $deporte) {
                if($deporte->estado=='1'){
                    DB::table('deportes')->where('id_deporte', $id)->update(array('estado'=>'0','updated_at'=>$fecha));
                    $mensaje='Deporte inactivado.';
                }else{
                    DB::table('deportes')->where('id_deporte', $id)->update(array('estado'=>'1','updated_at'=>$fecha));
                    $mensaje='Deporte activado.';
                }
            }
            $data = DB::table('deportes')->get();   
            return view('deportes.deporte',['data'=>$data,'mensaje'=>$mensaje,'type_men'=>'1']);
        }else{
            return redirect('/');
        }
    }
}
