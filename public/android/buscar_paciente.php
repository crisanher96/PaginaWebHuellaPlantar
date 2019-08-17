<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    require_once 'conexion.php';
    $num_iden = $_POST['iden'];


    $sql = "SELECT * FROM usuarios WHERE num_iden='$num_iden' ";
    
    $respuesta = mysqli_query($con, $sql);
    $impresion = array();
    $impresion['datos'] = array();  

    if ( mysqli_num_rows($respuesta) === 1 ) {
        $row = mysqli_fetch_assoc($respuesta);
        $impresion['identificacion'] = $row['id_usuario'];
        $impresion['nombre']=$row['nombres']." ".$row['apellidos'];
        $impresion['success'] = "1";
        echo json_encode($impresion);
    }else{
        $impresion['identificacion'] = "";
        $impresion['nombre']="";
    	$impresion['success'] = "2 ".$num_iden;
        echo json_encode($impresion);
    }

    mysqli_close($con);
}

?>