<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Http\Request;
use HuellaPlantar\Examen;
use DB;

class InformeController extends Controller
{
    
    public function general()
    {
        if (session()->get('rol')=='1' or session()->get('rol')=='2') {
            $datos=array(
                'pl_izq' => 0,
                'plno_izq' => 0,
                'no_izq' => 0,
                'noca_izq' => 0,
                'ca_izq' => 0,
                'cafu_izq' => 0,
                'caex_izq' => 0,
                'pl_der' => 0,
                'plno_der' => 0,
                'no_der' => 0,
                'noca_der' => 0,
                'ca_der' => 0,
                'cafu_der' => 0,
                'caex_der' => 0

            );
            $examens = DB::table('examens')->where('estado_exa', '1')->get();
            foreach ($examens as $examen) {
                //COndiones pie izquierdo
                if ($examen->clasi_izq=='Plano') {$datos["pl_izq"]=$datos["pl_izq"]+1;}
                if ($examen->clasi_izq=='Plano/Normal') {$datos["plno_izq"]=$datos["plno_izq"]+1;}
                if ($examen->clasi_izq=='Normal') {$datos["no_izq"]=$datos["no_izq"]+1;}
                if ($examen->clasi_izq=='Normal/Cavo') {$datos["noca_izq"]=$datos["noca_izq"]+1;}
                if ($examen->clasi_izq=='Cavo') {$datos["ca_izq"]=$datos["ca_izq"]+1;}
                if ($examen->clasi_izq=='Cavo/Fuerte') {$datos["cafu_izq"]=$datos["cafu_izq"]+1;}
                if ($examen->clasi_izq=='Cavo/Extremo') {$datos["caex_izq"]=$datos["caex_izq"]+1;}
                //COndiones pie derecho
                if ($examen->clasi_der=='Plano') {$datos["pl_der"]=$datos["pl_der"]+1;}
                if ($examen->clasi_der=='Plano/Normal') {$datos["plno_der"]=$datos["plno_der"]+1;}
                if ($examen->clasi_der=='Normal') {$datos["no_der"]=$datos["no_der"]+1;}
                if ($examen->clasi_der=='Normal/Cavo') {$datos["noca_der"]=$datos["noca_der"]+1;}
                if ($examen->clasi_der=='Cavo') {$datos["ca_der"]=$datos["ca_der"]+1;}
                if ($examen->clasi_der=='Cavo/Fuerte') {$datos["cafu_der"]=$datos["cafu_der"]+1;}
                if ($examen->clasi_der=='Cavo/Extremo') {$datos["caex_der"]=$datos["caex_der"]+1;}
            }
            return view('informes.informe',['data'=>$datos]);
        }else{
            return redirect('/');
        }
    }

    public function filtros(Request $request)
    {
        if (session()->get('rol')=='1' or session()->get('rol')=='2') {
            $datos=array(
                'pl_izq' => 0,
                'plno_izq' => 0,
                'no_izq' => 0,
                'noca_izq' => 0,
                'ca_izq' => 0,
                'cafu_izq' => 0,
                'caex_izq' => 0,
                'pl_der' => 0,
                'plno_der' => 0,
                'no_der' => 0,
                'noca_der' => 0,
                'ca_der' => 0,
                'cafu_der' => 0,
                'caex_der' => 0
            );

            if($request->input('id_deporte')=='0' and $request->input('id_cat_dep')=='0' and $request->input('id_profesion')=='0'){
                $examens = DB::table('examens')->where('estado_exa', '1')->get();
            }
            if($request->input('id_deporte')=='0' and $request->input('id_cat_dep')=='0' and $request->input('id_profesion')!='0'){
                $examens = DB::table('examens')
                        ->join('usuarios', 'examens.id_paciente', '=', 'usuarios.id_usuario')
                        ->where('examens.estado_exa', '1')
                        ->where('usuarios.id_profesion', $request->input('id_profesion'))
                        ->get();
            }
            if($request->input('id_deporte')=='0' and $request->input('id_cat_dep')!='0' and $request->input('id_profesion')=='0'){
                $examens = DB::table('examens')
                        ->join('usuarios', 'examens.id_paciente', '=', 'usuarios.id_usuario')
                        ->where('examens.estado_exa', '1')
                        ->where('usuarios.id_cat_dep', $request->input('id_cat_dep'))
                        ->get();
            }
            if($request->input('id_deporte')=='0' and $request->input('id_cat_dep')!='0' and $request->input('id_profesion')!='0'){
                $examens = DB::table('examens')
                        ->join('usuarios', 'examens.id_paciente', '=', 'usuarios.id_usuario')
                        ->where('examens.estado_exa', '1')
                        ->where('usuarios.id_cat_dep', $request->input('id_cat_dep'))
                        ->where('usuarios.id_profesion', $request->input('id_profesion'))
                        ->get();
            }
            if($request->input('id_deporte')!='0' and $request->input('id_cat_dep')=='0' and $request->input('id_profesion')=='0'){
                $examens = DB::table('examens')
                        ->join('usuarios', 'examens.id_paciente', '=', 'usuarios.id_usuario')
                        ->where('examens.estado_exa', '1')
                        ->where('usuarios.id_deporte', $request->input('id_deporte'))
                        ->get();
            }
            if($request->input('id_deporte')!='0' and $request->input('id_cat_dep')=='0' and $request->input('id_profesion')!='0'){
                $examens = DB::table('examens')
                        ->join('usuarios', 'examens.id_paciente', '=', 'usuarios.id_usuario')
                        ->where('examens.estado_exa', '1')
                        ->where('usuarios.id_deporte', $request->input('id_deporte'))
                        ->where('usuarios.id_profesion', $request->input('id_profesion'))
                        ->get();

            }
            if($request->input('id_deporte')!='0' and $request->input('id_cat_dep')!='0' and $request->input('id_profesion')=='0'){
                $examens = DB::table('examens')
                        ->join('usuarios', 'examens.id_paciente', '=', 'usuarios.id_usuario')
                        ->where('examens.estado_exa', '1')
                        ->where('usuarios.id_deporte', $request->input('id_deporte'))
                        ->where('usuarios.id_cat_dep', $request->input('id_cat_dep'))
                        ->get();
            }
            if($request->input('id_deporte')!='0' and $request->input('id_cat_dep')!='0' and $request->input('id_profesion')!='0'){
                $examens = DB::table('examens')
                        ->join('usuarios', 'examens.id_paciente', '=', 'usuarios.id_usuario')
                        ->where('examens.estado_exa', '1')
                        ->where('usuarios.id_deporte', $request->input('id_deporte'))
                        ->where('usuarios.id_cat_dep', $request->input('id_cat_dep'))
                        ->where('usuarios.id_profesion', $request->input('id_profesion'))
                        ->get();
            }
            
            foreach ($examens as $examen) {
                if ($examen->clasi_izq=='Plano') {$datos["pl_izq"]=$datos["pl_izq"]+1;}
                if ($examen->clasi_izq=='Plano/Normal') {$datos["plno_izq"]=$datos["plno_izq"]+1;}
                if ($examen->clasi_izq=='Normal') {$datos["no_izq"]=$datos["no_izq"]+1;}
                if ($examen->clasi_izq=='Normal/Cavo') {$datos["noca_izq"]=$datos["noca_izq"]+1;}
                if ($examen->clasi_izq=='Cavo') {$datos["ca_izq"]=$datos["ca_izq"]+1;}
                if ($examen->clasi_izq=='Cavo/Fuerte') {$datos["cafu_izq"]=$datos["cafu_izq"]+1;}
                if ($examen->clasi_izq=='Cavo/Extremo') {$datos["caex_izq"]=$datos["caex_izq"]+1;}
                //COndiones pie derecho
                if ($examen->clasi_der=='Plano') {$datos["pl_der"]=$datos["pl_der"]+1;}
                if ($examen->clasi_der=='Plano/Normal') {$datos["plno_der"]=$datos["plno_der"]+1;}
                if ($examen->clasi_der=='Normal') {$datos["no_der"]=$datos["no_der"]+1;}
                if ($examen->clasi_der=='Normal/Cavo') {$datos["noca_der"]=$datos["noca_der"]+1;}
                if ($examen->clasi_der=='Cavo') {$datos["ca_der"]=$datos["ca_der"]+1;}
                if ($examen->clasi_der=='Cavo/Fuerte') {$datos["cafu_der"]=$datos["cafu_der"]+1;}
                if ($examen->clasi_der=='Cavo/Extremo') {$datos["caex_der"]=$datos["caex_der"]+1;}
            }
            return view('informes.informe',['data'=>$datos]);
        }else{
            return redirect('/');
        }
    }

    
}
