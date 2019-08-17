<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Http\Request;
use HuellaPlantar\Diagnostico;
use DB;

class DiagnosticoController extends Controller
{
    public static function showactives($id)
    {
        $data = DB::table('diagnosticos')
        ->where('id_examen', $id)
        ->where('estado', '1')
        ->get();
        return $data;
    }
}
