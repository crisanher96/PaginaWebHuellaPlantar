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
    $diagnostico = $_POST["diagnostico"];

    $now = new \DateTime();
	$fecha_creacion= $now->format('Y-m-d H:i:s');
	$fecha_exa=$now->format('Y-m-d');
    $nombre_ori=$id_paciente."ORI".$now->format('Y').$now->format('m').$now->format('d').$now->format('H').$now->format('i').$now->format('s').".jpg";
    $nombre_izq=$id_paciente."IZQ".$now->format('Y').$now->format('m').$now->format('d').$now->format('H').$now->format('i').$now->format('s').".jpg";
    $nombre_der=$id_paciente."DER".$now->format('Y').$now->format('m').$now->format('d').$now->format('H').$now->format('i').$now->format('s').".jpg";	
    $path_ori = "../images_examenes/originales/$nombre_ori";
    $path_izq = "../images_examenes/resultados/$nombre_izq";
    $path_der = "../images_examenes/resultados/$nombre_der";
	

    if($estado_exa=="1"){
        $sql2="SELECT * FROM examens WHERE id_paciente='$id_paciente' AND estado_exa='1'";
        $data=mysqli_query($con, $sql2);
        $filas = mysqli_num_rows($data);
        $bandera_insert=0;
        if($filas=="1"){
            while($fila=mysqli_fetch_array($data))
            {
                $id_examen_temp=$fila ['id_examen'];
                $sql3="UPDATE examens SET estado_exa='2' WHERE id_examen='$id_examen_temp'";
                if(mysqli_query($con, $sql3)){
                    $bandera_insert=1;      }
                
            }
        }else{
            $bandera_insert=1;
        }
    }

     if($estado_exa=="3"){
            $bandera_insert=1;
     }
     
    if($bandera_insert==1){
        
        $sql = "INSERT INTO examens (id_paciente, id_enc_exa, fecha, indice_izq, indice_der, clasi_izq, clasi_der, imagen_original, imagen_izq, imagen_der, vx_izq, vy_izq, vx_der, vy_der, estado_exa, created_at, updated_at) VALUES ('$id_paciente','$id_enc_exa','$fecha_exa','$indice_izq','$indice_der','$clasi_izq','$clasi_der','$nombre_ori','$nombre_izq','$nombre_der','$vx_izq','$vy_izq','$vx_der','$vy_der','$estado_exa','$fecha_creacion','$fecha_creacion')";
        if ( mysqli_query($con, $sql) ) {
            file_put_contents($path_ori,base64_decode($imagen_original));
            file_put_contents($path_izq,base64_decode($imagen_izq));
            file_put_contents($path_der,base64_decode($imagen_der));
            
            
            if($estado_exa=="1"){
                $sql4="SELECT * FROM examens WHERE id_paciente='$id_paciente' AND estado_exa='1'";
                $data2=mysqli_query($con, $sql4);
                while($fila2=mysqli_fetch_array($data2))
                {
                    $id_examen_temp2=$fila2 ['id_examen'];
                    $sql5="INSERT INTO diagnosticos (id_examen, id_medico, diagnostico, estado, created_at, updated_at) VALUES ('$id_examen_temp2','$id_enc_exa','$diagnostico','1','$fecha_creacion','$fecha_creacion')";
                    mysqli_query($con, $sql5);
                }
                
            }
            $result["success"] = "1";
            echo json_encode($result);
        } else {
            $result["success"] = "0";
            echo json_encode($result);
        }

    }else {
        $result["success"] = "0";
        echo json_encode($result);
    }
  mysqli_close($con);
}

?>