<?php

namespace HuellaPlantar\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use HuellaPlantar\Usuario;
use DB;

class SessionController extends Controller
{
    
    public function autenticacion(Request $request)
    {
        $users = DB::table('usuarios')->where('num_iden', $request->input('num_iden'))->get();
        if (count($users)==1){
            foreach ($users as $user)
            {             
                if (Hash::check($request->input('password'), $user->password)) {
                        session()->put('rol', $user->id_rol);
                        session()->put('id', $user->id_usuario);
                        return redirect('/perfil');
                }else{
                    $mensaje='Su contraseña es incorrecta. Por favor verifiquela e ingrese nuevamente.';
                    return view('usuarios.login',['mensaje'=>$mensaje,'type_men'=>'0']);
                }
            }
        }else{
            $mensaje='El documento de identificación no se encuentra registrado.';
            return view('usuarios.login',['mensaje'=>$mensaje,'type_men'=>'0']);
        }
    }

}
