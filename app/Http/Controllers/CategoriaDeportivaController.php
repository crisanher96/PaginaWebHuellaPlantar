<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Http\Request;
use HuellaPlantar\CategoriaDeportiva;
use DB;

class CategoriaDeportivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('rol')=='1') {
            $data = DB::table('categoria_deportivas')->get();
            return view('categorias-deportivas.categoria-deportiva',['data'=>$data]);
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
            $cat_dep = new CategoriaDeportiva();
            $cat_dep->nombre_cat_dep=$request->input('nombre_cat_dep');
            $cat_dep->estado='1';
            $cat_dep->save();
            $data = DB::table('categoria_deportivas')->get();   
            return view('categorias-deportivas.categoria-deportiva',['data'=>$data,'mensaje'=>'Registro exitoso.','type_men'=>'1']);
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
        $data = DB::table('categoria_deportivas')->where('id_cat_dep', $id)->get();
        return $data;
    }

    public static function showactives()
    {
        $data = DB::table('categoria_deportivas')->where('estado', '1')->get();
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
            $data = DB::table('categoria_deportivas')->where('id_cat_dep', $id)->get();
            return view('categorias-deportivas.categoria-deportiva',['data_m'=>$data]);
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
            DB::table('categoria_deportivas')->where('id_cat_dep', $id)->update(array('nombre_cat_dep'=>$request->input('nombre_cat_dep'),'updated_at'=>$fecha));
            $data = DB::table('categoria_deportivas')->get();   
            return view('categorias-deportivas.categoria-deportiva',['data'=>$data,'mensaje'=>'Actualización de la categoria exitosa.','type_men'=>'1']);
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
            $data=DB::table('categoria_deportivas')->where('id_cat_dep', $id)->get();
            foreach ($data as $cat_dep) {
                if($cat_dep->estado=='1'){
                    DB::table('categoria_deportivas')->where('id_cat_dep', $id)->update(array('estado'=>'0','updated_at'=>$fecha));
                    $mensaje='Categoria inactivada.';
                }else{
                    DB::table('categoria_deportivas')->where('id_cat_dep', $id)->update(array('estado'=>'1','updated_at'=>$fecha));
                    $mensaje='Categoria activada.';
                }
            }
            $data = DB::table('categoria_deportivas')->get();   
            return view('categorias-deportivas.categoria-deportiva',['data'=>$data,'mensaje'=>$mensaje,'type_men'=>'1']);
        }else{
            return redirect('/');
        }
    }
}
