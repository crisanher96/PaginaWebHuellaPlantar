<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    require_once 'conexion.php';
    $num_iden = $_POST['iden'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM usuarios WHERE num_iden='$num_iden' ";
    
    $respuesta = mysqli_query($con, $sql);
    $impresion = array();
    $impresion['datos'] = array();  

    if ( mysqli_num_rows($respuesta) === 1 ) {
        $row = mysqli_fetch_assoc($respuesta);
        if ( password_verify($password, $row['password']) ) {
              
            $impresion['rol'] = $row['id_rol'];
            $impresion['identificacion'] = $row['id_usuario'];
            $impresion['success'] = "1";
            echo json_encode($impresion);

        } else {
        	$impresion['rol']="";
            $impresion['identificacion'] = "";
            $impresion['success'] = "0";
            echo json_encode($impresion);
        }

    }else{
    	$impresion['rol']="";
        $impresion['identificacion'] = "";
    	$impresion['success'] = "3";
        echo json_encode($impresion);
    }

    mysqli_close($con);
}

?>