<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Http\Request;
use HuellaPlantar\Examen;
use HuellaPlantar\Diagnostico;
use DB;


class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('id')) {
            $examens = DB::table('examens')->where('id_paciente', session()->get('id'))->get();
            return view('examenes.examen',['data'=>$examens]);
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show_gestion()
    {
        if (session()->get('rol')=='2') {
            $data_1 = DB::table('examens')
            ->where('estado_exa', '1')
            ->orwhere('estado_exa', '2')
            ->get();
            $data_2 = DB::table('examens')
            ->where('estado_exa', '3')
            ->get();
            return view('examenes.gestion',['data1'=>$data_1,'data2'=>$data_2]);
        }else{
            return redirect('/');
        }
    }

    public function diagnostico_gestion($id_examen, $bandera)
    {
        if (session()->get('rol')=='2') {
            $data = DB::table('examens')->where('id_examen', $id_examen)->get();
            return view('examenes.more2',['data'=>$data,'bandera'=>$bandera,'id_examen'=>$id_examen]);
        }else{
            return redirect('/');
        }
    }


    public function update_diagnostico(Request $request,$id_examen, $bandera)
    {
        if (session()->get('rol')=='2') {
            $now = new \DateTime();
            $fecha= $now->format('Y-m-d H:i:s');
            $diagnostico = new Diagnostico();
            $diagnostico ->id_examen=$id_examen;
            $diagnostico ->id_medico=session()->get('id');
            $diagnostico ->diagnostico=$request->input('diagnostico');
            $diagnostico ->estado='1';
            $diagnostico ->save();

            if($bandera=='1'){
                $data_temp = DB::table('examens')->where('id_examen', $id_examen)->get();
                foreach ($data_temp as $examen) {
                    $id_paciente=$examen->id_paciente;
                }  
                $data_temp2 = DB::table('examens')->where('id_paciente', $id_paciente)->get();
                foreach ($data_temp2 as $examen) {
                    if($examen->estado_exa=='1'){
                    DB::table('examens')->where('id_examen', $examen->id_examen)->update(array('estado_exa'=>'2','updated_at'=>$fecha));
                    }
                }
                DB::table('examens')->where('id_examen', $id_examen)->update(array('estado_exa'=>'1','updated_at'=>$fecha));  
            }

            $data = DB::table('examens')->where('id_examen', $id_examen)->get();
            return view('examenes.more2',['data'=>$data,'bandera'=>$bandera,'id_examen'=>$id_examen,'mensaje'=>'Registro del diagnostico exitoso.','type_men'=>'1']);
        }else{
            return redirect('/');
        }
    }


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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function more($id)
    {
        if (session()->has('id')) {
            $data = DB::table('examens')->where('id_examen', $id)->get();
            foreach ($data as $examen) {
                if($examen->id_paciente==session()->get('id')){
                    return view('examenes.more',['data'=>$data]);
                }else{
                    return redirect('/');
                }
            }
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
        //
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
        //
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
