<?php

$datVariable = $_REQUEST['dato'];
$arreglo = array();
switch ($datVariable) {
        case 1:  
            include ('conexion.php');
            $cedula = $_REQUEST['cedula'];
             $query = "SELECT * from paciente where cedula = '" . $cedula . "'";
             $res=$con->query($query);
             $rows = $res->fetch_all(MYSQLI_ASSOC);
             echo json_encode($rows);
        break;
        default:
        echo ("no hay datos");
        break;
}

