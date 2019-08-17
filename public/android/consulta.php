<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    require_once 'conexion.php';
    $id_paciente = $_POST["id_paciente"];
    $id_enc_exa = $_POST["id_enc_exa"];
    $indice_izq = $_POST["indice_izq"];
    $indice_der = $_POST["indice_der"];
    $clasi_izq = $_POST["clasi_izq"];
    $clasi_der = $_POST["clasi_der"];
    $imagen_original = $_POST["imagen_original"];
    $imagen_izq = $_POST["imagen_izq"];
    $imagen_der = $_POST["imagen_der"];
    $vx_izq = $_POST["vx_izq"];
    $vx_der = $_POST["vx_der"];
    $vy_izq = $_POST["vy_izq"];
    $vy_der = $_POST["vy_der"];
    $estado_exa = $_POST["estado_exa"];

    $now = new \DateTime();
	$fecha_creacion= $now->format('Y-m-d H:i:s');
	$fecha_exa=$now->format('Y-m-d');
    $nombre_ori=$id_paciente."ORI".$now->format('Y').$now->format('m').$now->format('d').$now->format('H').$now->format('i').$now->format('s').".jpg";
    $nombre_izq=$id_paciente."IZQ".$now->format('Y').$now->format('m').$now->format('d').$now->format('H').$now->format('i').$now->format('s').".jpg";
    $nombre_der=$id_paciente."DER".$now->format('Y').$now->format('m').$now->format('d').$now->format('H').$now->format('i').$now->format('s').".jpg";	
    $path_ori = "images/$nombre_ori.jpg";
    $path_izq = "images/$nombre_izq.jpg";
    $path_der = "images/$nombre_der.jpg";
	

    $sql = "INSERT INTO examens (id_paciente, id_enc_exa, fecha, indice_izq, indice_der, clasi_izq, clasi_der, imagen_original, imagen_izq, imagen_der, vx_izq, vy_izq, vx_der, vy_der, estado_exa, created_at, updated_at) VALUES ('$id_paciente','$id_enc_exa','$fecha_exa','$indice_izq','$indice_der','$clasi_izq','$clasi_der','$nombre_ori','$nombre_izq','$nombre_der','$vx_izq','$vy_izq','$vx_der','$vy_der','$estado_exa','$fecha_exa','$fecha_exa')";
    if ( mysqli_query($con, $sql) ) {
    	file_put_contents($path_ori,base64_decode($imagen_original));
		file_put_contents($path_izq,base64_decode($imagen_izq));
		file_put_contents($path_der,base64_decode($imagen_der));
        $result["success"] = "1";
        echo json_encode($result);
     } else {
        $result["success"] = "0";
        echo json_encode($result);
    }
  mysqli_close($con);
}

?>