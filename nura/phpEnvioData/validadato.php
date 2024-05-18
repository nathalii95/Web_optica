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
        case 2:  
            include ('conexion.php');
            $cedula = $_REQUEST['cedula'];
             $query = "SELECT * from empleado where cedula = '" . $cedula . "'";
             $res=$con->query($query);
             $rows = $res->fetch_all(MYSQLI_ASSOC);
             echo json_encode($rows);
        break;
        case 3:
            include_once("conexion.php");
              $id=$_REQUEST["id"];
              $sql = "UPDATE empleado set estado = '0' where id_empleado = '$id'";
              if (mysqli_query($con, $sql)) {
                echo json_encode(array("statusCode"=>200));
            } 
            else {
                echo json_encode(array("statusCode"=>201));
            }
            mysqli_close($con);
         break;
         case 4:
            include_once("conexion.php");
              $id=$_REQUEST["id"];
              $sql = "UPDATE enfermedad set estado = '0' where id_enfermedad = '$id'";
              if (mysqli_query($con, $sql)) {
                echo json_encode(array("statusCode"=>200));
            } 
            else {
                echo json_encode(array("statusCode"=>201));
            }
            mysqli_close($con);
         break;
         case 5:
          include_once ("conexion.php");
            $cedula = $_REQUEST['cedula'];
             $query = "select pe.* from paciente pa, persona pe where pa.cedula = '" . $cedula . "' and pa.cedula = pe.cedula  ";
             $res=$con->query($query);
             $rows = $res->fetch_all(MYSQLI_ASSOC);
             echo json_encode($rows);
       break;
       case 6:
        include_once("conexion.php");
          $id=$_REQUEST["id"];
          $sql = "UPDATE agendamiento set estado = '2' where id_agendamiento= '$id'";
          if (mysqli_query($con, $sql)) {
            echo json_encode(array("statusCode"=>200));
        } 
        else {
            echo json_encode(array("statusCode"=>201));
        }
        mysqli_close($con);
     break;
     case 7:
      include_once("conexion.php");
        $id=$_REQUEST["id"];
        $sql = "UPDATE paciente set estado = '0' where id_paciente= '$id'";
        if (mysqli_query($con, $sql)) {
          echo json_encode(array("statusCode"=>200));
      } 
      else {
          echo json_encode(array("statusCode"=>201));
      }
      mysqli_close($con);
   break;
   case 8:  
    include_once ('conexion.php');
    $fecha = $_REQUEST['fecha'];
     $query = "SELECT id_agendamiento, hora , estado  FROM agendamiento WHERE fecha = '$fecha' AND estado  != '2'";
     $res=$con->query($query);
     $rows = $res->fetch_all(MYSQLI_ASSOC);
     echo json_encode($rows);
break;
case 9:
  include_once ('conexion.php');
  $cedula = $_REQUEST['cedula'];
  $referido = $_REQUEST['referido'];
  $motivo_consulta = $_REQUEST['motivo_consulta'];
  $fecha_emision = $_REQUEST['fecha_emision'];
  $observacion_general = $_REQUEST['observacion_general'];
  $mx1 = $_REQUEST['mx1'];
  $mx2 = $_REQUEST['mx2'];
  $mx3 = $_REQUEST['mx3'];
  $mx4 = $_REQUEST['mx4'];
  $mx5 = $_REQUEST['mx5'];
  $mx6 = $_REQUEST['mx6'];
  $mx1_text = $_REQUEST['mx1_text'];
  $mx2_text = $_REQUEST['mx2_text'];
  $mx3_text = $_REQUEST['mx3_text']; 
  $mx4_text = $_REQUEST['mx4_text']; 
  $mx5_text = $_REQUEST['mx5_text']; 
  $mx6_text = $_REQUEST['mx6_text']; 
  $total = $_REQUEST['total']; 
  $usa_lente_a  = $_REQUEST['usa_lente_a']; 
  $tipo_lente_a = $_REQUEST['tipo_lente_a']; 
  $usa_antiguo = $_REQUEST['usa_antiguo']; 
  $tipo_lente_n = $_REQUEST['tipo_lente_n']; 
  $usa_nuevo  = $_REQUEST['usa_nuevo']; 
  $observacion_lente = $_REQUEST['observacion_lente']; 
  $enfermedad = $_REQUEST['enfermedad']; 
  $ojoDominante = $_REQUEST['ojoDominante']; 
/*   $fecha=date("Y-m-d"); */

  $sql = "insert into ficha_paciente (id_ficha,cedula,referido,motivo_consulta,fecha_emision,observacion_general,mx1,mx2,mx3,mx4,mx5,mx6,mx1_text,mx2_text,mx3_text,mx4_text,mx5_text,mx6_text,usa_lente_a,tipo_lente_a ,usa_antiguo,tipo_lente_n,usa_nuevo,observacion_lente,total,estado, created_at  , updated_at ) ";
  $sql .= "values (NULL,'".$cedula."','".$referido."','".$motivo_consulta."','".$fecha_emision."','".$observacion_general."','".$mx1."','".$mx2."','".$mx3."','".$mx4."','".$mx5."','".$mx6."','".$mx1_text."','".$mx2_text."','".$mx3_text."','".$mx4_text."','".$mx5_text."','".$mx6_text."','".$usa_lente_a."','".$tipo_lente_a."','".$usa_antiguo."','".$tipo_lente_n."','".$usa_nuevo."','".$observacion_lente."','".$total."','1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";	
 
  guardarCotizacion($sql,$enfermedad,$ojoDominante);

  break;
  case 10:
    $id_ficha = $_REQUEST['idFicha'];
    $tipo = $_REQUEST['tipo'];
    $ojo = $_REQUEST['ojo'];
    $sph = $_REQUEST['sph'];
    $cyl = $_REQUEST['cyl'];
    $eje = $_REQUEST['eje'];
    $estado_medida = $_REQUEST['estadom'];
    $sql = "insert into medida_lente (id_medida,id_ficha,tipo,ojo,sph,cyl,eje,estado_medida,estado, created_at, updated_at ) ";
    $sql .= "values (NULL,'".$id_ficha."','".$tipo."','".$ojo."','".$sph."','".$cyl."','".$eje."','".$estado_medida."','1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";	

    guardarDetalleCotizacion($sql);

break;


case 11:
  $id_ficha = $_REQUEST['id'];
  $sinLentes = $_REQUEST['sinLentes'];
  $lenteUso = $_REQUEST['lenteUso'];
  $conCorreciob = $_REQUEST['conCorreciob'];
  $ojo = $_REQUEST['ojo'];
  $tipo = $_REQUEST['tipo'];

  $sql = "insert into agudeza (id_agudez,id_ficha ,sin_lentes,lentes_en_uso,con_correccion,tipo_ojo,tipo_agudez,estado,created_at,updated_at) ";
  $sql .= "values (NULL,'".$id_ficha."','".$sinLentes."','".$lenteUso."','".$conCorreciob."','".$ojo."','".$tipo."','1',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";	
  print_r($sql);
    guardarDetalleCotizacion2($sql);
    break;
    case 12:
      $id_ficha = $_REQUEST['id'];
      $codigo = $_REQUEST['codigo'];
      $nombre = $_REQUEST['nombre'];
      $valor = $_REQUEST['valor'];


      $sql = "insert into producto_ficha (id_lenteproducto,id_ficha,codigo,producto_nombre,valor,estado,created_at,updated_at) ";
      $sql .= "values (NULL,'".$id_ficha."','".$codigo."','".$nombre."','".$valor."','1',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";	
/*       print_r($sql); */
      guardarDetalleCotizacion3($sql);
        break;
        case 13:  
          include_once ('conexion.php');
           $query = "SELECT *  FROM tipo_producto where estado = '1'";
           $res=$con->query($query);
           $rows = $res->fetch_all(MYSQLI_ASSOC);
           echo json_encode($rows);
      break;
      case 14:
        include_once("conexion.php");
          $id=$_REQUEST["id"];
          $sql = "UPDATE tipo_producto set estado = '0' where id_tipo_producto= '$id'";
          if (mysqli_query($con, $sql)) {
            echo json_encode(array("statusCode"=>200));
        } 
        else {
            echo json_encode(array("statusCode"=>201));
        }
        mysqli_close($con);
     break;
     case 15:  
      include_once ('conexion.php');
       $id=$_REQUEST["id"];
       $query = "SELECT *  FROM ingreso where id_ingreso = '$id'";
       $res=$con->query($query);
       $rows = $res->fetch_all(MYSQLI_ASSOC);
       echo json_encode($rows);
  break;
  case 16:  
    include_once ('conexion.php');
     $id=$_REQUEST["id"];
     $query = "   SELECT i.*, t.tipo_nombre, e.nombre FROM  ingreso_dt i, tipo_producto t, estado_ingreso e where i.fk_ingreso = '$id' AND i.fk_tipo_producto  = t.id_tipo_producto AND i.estado = e.id_estado";
     $res=$con->query($query);
     $rows = $res->fetch_all(MYSQLI_ASSOC);
     echo json_encode($rows);
break;
case 17:  
  include_once ('conexion.php');
   $tipo=$_REQUEST["tipo"];
   $estado=$_REQUEST["estado"];
            $sql = "SELECT i.*, t.tipo_nombre, e.nombre ";
            $sql .= "FROM ingreso_dt i, tipo_producto t, estado_ingreso e ";
            $sql .= "WHERE i.fk_tipo_producto  = t.id_tipo_producto  ";
            $sql .= " AND  i.estado = e.id_estado ";
            $sql .= ($tipo !== 0) ? "  AND  i.fk_tipo_producto   = '{$tipo}'  " : "";
            $sql .= ($estado !== 0) ? "  AND  i.estado = '{$estado}'  " : "";
   $res=$con->query($sql);
   $rows = $res->fetch_all(MYSQLI_ASSOC);
   echo json_encode($rows);
break;
case 18:  
  include_once ('conexion.php');
   $sql = "SELECT i.*, t.tipo_nombre, e.nombre FROM  ingreso_dt i, tipo_producto t, estado_ingreso e WHERE  i.fk_tipo_producto  = t.id_tipo_producto AND i.estado = e.id_estado";
   $res=$con->query($sql);
   $rows = $res->fetch_all(MYSQLI_ASSOC);
   echo json_encode($rows);
break;
case 19:  
  include_once ('conexion.php');
  $producto =$_REQUEST["codigoArmazon"];
   $sql = "SELECT dt.codigo_producto , dt.precio_compra , dt.precio_venta , tp.tipo_nombre FROM ingreso_dt dt,  tipo_producto tp WHERE dt.codigo_producto = '$producto' AND dt.fk_tipo_producto = '1' AND dt.estado = '1' AND  dt.fk_tipo_producto = tp.id_tipo_producto";
   $res=$con->query($sql);
   $rows = $res->fetch_all(MYSQLI_ASSOC);
   echo json_encode($rows);
break;
case 20:
  $id =  json_decode($_REQUEST['id_ficha']);
  consultaragLejos($id); 
break;
case 21:
  $id =  json_decode($_REQUEST['id_ficha']);
  consultaragLectura($id); 
break;
case 22:
  $id =  json_decode($_REQUEST['id_ficha']);
  consultamedidalentactual($id); 
break;
case 23:  
  include_once ('conexion.php');
  $id =$_REQUEST["id_ficha"];
   $query = "select * from ficha_paciente where id_ficha =  '{$id}'";
   $res=$con->query($query);
   $rows = $res->fetch_all(MYSQLI_ASSOC);
   echo json_encode($rows);
break;
case 24:  
  include_once ('conexion.php');
  $id =$_REQUEST["id_ficha"];
   $query = "select * from producto_ficha WHERE id_ficha = '{$id}' and estado = '1' and producto_nombre = 'Armazon'";
   $res=$con->query($query);
   $rows = $res->fetch_all(MYSQLI_ASSOC);
   echo json_encode($rows);
break;
case 25:  
  include_once ('conexion.php');
  $id =$_REQUEST["id_ficha"];
   $query = "select * from producto_ficha WHERE id_ficha = '{$id}' and estado = '1' and producto_nombre = 'Lunas'";
   $res=$con->query($query);
   $rows = $res->fetch_all(MYSQLI_ASSOC);
   echo json_encode($rows);
break;
case 26:
  include_once("conexion.php");
    $id=$_REQUEST["id"];
  $observacion_general = $_REQUEST['observacion_general'];
  $mx1 = $_REQUEST['mx1'];
  $mx2 = $_REQUEST['mx2'];
  $mx3 = $_REQUEST['mx3'];
  $mx4 = $_REQUEST['mx4'];
  $mx5 = $_REQUEST['mx5'];
  $mx6 = $_REQUEST['mx6'];
  $mx1_text = $_REQUEST['mx1_text'];
  $mx2_text = $_REQUEST['mx2_text'];
  $mx3_text = $_REQUEST['mx3_text']; 
  $mx4_text = $_REQUEST['mx4_text']; 
  $mx5_text = $_REQUEST['mx5_text']; 
  $mx6_text = $_REQUEST['mx6_text']; 
  $total = $_REQUEST['total']; 
  $tipo_lente_n = $_REQUEST['tipo_lente_n']; 
  $usa_nuevo  = $_REQUEST['usa_nuevo']; 

  $referido   = $_REQUEST['referido']; 
  $motivo_consulta  = $_REQUEST['motivo_consulta']; 
  $observacion1   = $_REQUEST['observacion1']; 
  $tipo_lente_a   = $_REQUEST['tipo_lente_a']; 
  $usa_lente_a    = $_REQUEST['usa_lente_a']; 
  $enfermedad    = $_REQUEST['enfermedad']; 
  $ojoDominante  = $_REQUEST['ojoDominante']; 
   $cedula =  $_REQUEST['cedula']; 

    $sql = "UPDATE ficha_paciente set referido = '$referido', motivo_consulta = '$motivo_consulta', observacion_general = '$observacion1', usa_lente_a = '$usa_lente_a', tipo_lente_a = '$tipo_lente_a', usa_antiguo = '0', 
    mx1 = '$mx1', mx2 = '$mx2', mx3 = '$mx3', mx4 = '$mx4', mx5 = '$mx5', mx6 = '$mx6', mx1_text = '$mx1_text', mx2_text = '$mx2_text', mx3_text = '$mx3_text', mx4_text = '$mx4_text', mx5_text = '$mx5_text' ,mx6_text = '$mx6_text' , total = '$total', 
    tipo_lente_n = '$tipo_lente_n', usa_nuevo = '$usa_nuevo' , observacion_lente = '$observacion_general' where id_ficha = '$id'";
    if (mysqli_query($con, $sql)) {
      echo json_encode(array("statusCode"=>200));
      actualiazaPaciente($enfermedad,$ojoDominante,$cedula);
  } 
  else {
      echo json_encode(array("statusCode"=>201));
  }
  mysqli_close($con);
break;
case 27:
  include_once("conexion.php");
  $id = $_REQUEST['id'];
  $id_agudez = $_REQUEST['id_agudez'];
  $sin_lentes = $_REQUEST['sin_lentes'];
  $lentes_en_uso = $_REQUEST['lentes_en_uso'];
  $con_correccion = $_REQUEST['con_correccion'];
  $tipo_ojo = $_REQUEST['tipo_ojo'];
  updateagudezaLejos($id_agudez, $id ,$sin_lentes,$lentes_en_uso,$con_correccion);
break;
case 28:
  include_once("conexion.php");
  $id = $_REQUEST['id'];
  $id_agudez = $_REQUEST['id_agudez'];
  $sin_lentes = $_REQUEST['sin_lentes'];
  $lentes_en_uso = $_REQUEST['lentes_en_uso'];
  $con_correccion = $_REQUEST['con_correccion'];
  $tipo_ojo = $_REQUEST['tipo_ojo'];
  updateagudezaLectura($id_agudez, $id ,$sin_lentes,$lentes_en_uso,$con_correccion);
break;
case 29:
  include_once("conexion.php");
  $id = $_REQUEST['id'];
  $id_medida = $_REQUEST['id_medida'];
  $tipo = $_REQUEST['tipo'];
  $ojo = $_REQUEST['ojo'];
  $sph = $_REQUEST['sph'];
  $cyl = $_REQUEST['cyl'];
  $eje = $_REQUEST['eje'];
  updateamedidaLente($id_medida, $id ,$tipo,$ojo,$sph,$cyl,$eje);
break;

case 30:
  include_once("conexion.php");
  $id = $_REQUEST['id'];
  $id_lenteproducto = $_REQUEST['id_lenteproducto'];
  $codigo = $_REQUEST['codigo'];
  $producto_nombre = $_REQUEST['producto_nombre'];
  $valor = $_REQUEST['valor'];
  updateprudctoFicha1($id, $id_lenteproducto ,$codigo,$valor);
  updateprudctoFicha2($id, $id_lenteproducto ,$codigo,$valor);
break;
case 31:
  $id =  json_decode($_REQUEST['id_ficha']);
  consultamedidaAntigua($id); 
break;
case 32:
  include_once("conexion.php");
  $id = $_REQUEST['id'];
  $id_medida = $_REQUEST['id_medida'];
  $tipo = $_REQUEST['tipo'];
  $ojo = $_REQUEST['ojo'];
  $sph = $_REQUEST['sph'];
  $cyl = $_REQUEST['cyl'];
  $eje = $_REQUEST['eje'];
  updateamedidaLenteAntigua($id_medida, $id ,$tipo,$ojo,$sph,$cyl,$eje);
break;
        default:
        echo ("no hay datos");
        break;
}




function updateamedidaLenteAntigua($id_medida, $id ,$tipo,$ojo,$sph,$cyl,$eje){ 
  include('conexion.php');	
  $sql = "select * from medida_lente where id_ficha = '".$id."' and estado_medida = '0' order by tipo = 'LEJOS' DESC";
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
          $sql = "update medida_lente set ojo =  '".$ojo."' , sph = '".$sph."' , cyl = '".$cyl."' , eje = '".$eje."', updated_at  = CURRENT_TIMESTAMP  ";
          $sql .= " where id_medida = '".$id_medida."' and tipo = '".$tipo."'";
      /*     print_r($sql); */
    $result = mysqli_query($con,$sql);
  }/* else{
    $sql = "insert into producto_ficha (id_lenteproducto,id_ficha,codigo,producto_nombre,valor,estado) ";
    $sql .= "values ('".$id_lenteproducto."','".$id."','Lunas','".$valor."','1')";
$result = mysqli_query($con,$sql);
} */
}

function consultamedidaAntigua($id){
  include('conexion.php'); 
  $sql = "SELECT * FROM medida_lente WHERE id_ficha = '$id' AND estado_medida = '0'  AND estado = '1' order by tipo = 'LEJOS' DESC";   
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      $test[] = $row;
      print json_encode($test) ;
  }else{
      print_r (2);
  }    
}

function updateprudctoFicha1($id, $id_lenteproducto ,$codigo,$valor){ 
  include('conexion.php');	
  $sql = "select * from producto_ficha where id_ficha = '".$id."' and  producto_nombre = 'Armazon'";
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
          $sql = "update producto_ficha set codigo =  '".$codigo."' , valor = '".$valor."', updated_at = CURRENT_TIMESTAMP  ";
          $sql .= " where id_lenteproducto = '".$id_lenteproducto."' ";
      /*     print_r($sql); */
    $result = mysqli_query($con,$sql);
  }/* else{
    $sql = "insert into producto_ficha (id_lenteproducto,id_ficha,codigo,producto_nombre,valor,estado) ";
    $sql .= "values ('".$id_lenteproducto."','".$id."','Armazon','".$valor."','1')";
$result = mysqli_query($con,$sql);
} */
}

function updateprudctoFicha2($id, $id_lenteproducto ,$codigo,$valor){ 
  include('conexion.php');	
  $sql = "select * from producto_ficha where id_ficha = '".$id."' and  producto_nombre = 'Lunas'";
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
          $sql = " update producto_ficha set codigo =  '".$codigo."' , valor = '".$valor."', updated_at = CURRENT_TIMESTAMP   ";
          $sql .= " where id_lenteproducto = '".$id_lenteproducto."' ";
      /*     print_r($sql); */
    $result = mysqli_query($con,$sql);
  }/* else{
    $sql = "insert into producto_ficha (id_lenteproducto,id_ficha,codigo,producto_nombre,valor,estado) ";
    $sql .= "values ('".$id_lenteproducto."','".$id."','Lunas','".$valor."','1')";
$result = mysqli_query($con,$sql);
} */
}


function updateamedidaLente($id_medida, $id ,$tipo,$ojo,$sph,$cyl,$eje){ 
  include('conexion.php');	
  $sql = "select * from medida_lente where id_ficha = '".$id."' and estado_medida = '1' order by tipo = 'LEJOS' DESC";
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
          $sql = "update medida_lente set ojo =  '".$ojo."' , sph = '".$sph."' , cyl = '".$cyl."' , eje = '".$eje."', updated_at  = CURRENT_TIMESTAMP  ";
          $sql .= " where id_medida = '".$id_medida."' and tipo = '".$tipo."'";
      /*     print_r($sql); */
    $result = mysqli_query($con,$sql);
  }/* else{
    $sql = "insert into producto_ficha (id_lenteproducto,id_ficha,codigo,producto_nombre,valor,estado) ";
    $sql .= "values ('".$id_lenteproducto."','".$id."','Lunas','".$valor."','1')";
$result = mysqli_query($con,$sql);
} */
}


function updateagudezaLejos($id_agudez,$id,$sin_lentes,$lentes_en_uso,$con_correccion){ 
  include('conexion.php');	
  $sql = "select * from agudeza where id_ficha = '".$id."' and tipo_agudez = 'lejos' and estado = '1' order by tipo_ojo = 'A.O' desc";
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
          $sql = "update agudeza set sin_lentes =  '".$sin_lentes."' , lentes_en_uso = '".$lentes_en_uso."' , con_correccion = '".$con_correccion."' ";
          $sql .= "where id_agudez = '".$id_agudez."'";
      /*     print_r($sql); */
    $result = mysqli_query($con,$sql);
  }
}

function updateagudezaLectura($id_agudez,$id,$sin_lentes,$lentes_en_uso,$con_correccion){ 
  include('conexion.php');	
  $sql = "select * from agudeza where id_ficha = '".$id."' and tipo_agudez = 'lectura' and estado = '1' order by tipo_ojo = 'A.O' desc";
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
          $sql = "update agudeza set sin_lentes =  '".$sin_lentes."' , lentes_en_uso = '".$lentes_en_uso."' , con_correccion = '".$con_correccion."'  ";
          $sql .= "where id_agudez = '".$id_agudez."'";
          print_r($sql);
    $result = mysqli_query($con,$sql);
  }
}

function guardarCotizacion($sql,$enfermedad,$ojoDominante){
  include ('conexion.php');
  $result = mysqli_query($con,$sql);
    if($result){
          $sql2 = "select max(id_ficha) as maxId, max(cedula) maxCedula  from ficha_paciente";
          $result = mysqli_query($con,$sql2);
          $result = (mysqli_fetch_assoc($result));
              if($result){
                  $result = mysqli_query($con,$sql2);
                  while($row = mysqli_fetch_assoc($result))
                  $test[] = $row;
                  $test[0]['maxId'] = $test[0]['maxId'];
                  $cedula = $test[0]['maxCedula'];
                  /* echo ($test); */
                  actualiazaPaciente($enfermedad,$ojoDominante,$cedula);
                  print json_encode($test);
              }/* else{
                  print_r (2);
              } */
    }	
}

function actualiazaPaciente($enfermedad,$ojoDominante,$cedula){ 
  include('conexion.php');	
  $sql =  ("UPDATE paciente set fk_enfermedad	= '".$enfermedad."', ojo_dominante = '".$ojoDominante."', updated_at  = CURRENT_TIMESTAMP  where cedula = '".$cedula."' ");
  $result = mysqli_query($con,$sql);
  /* if(isset ($result)){
   return true;
	}else{
    return false;
}  */
}

function guardarDetalleCotizacion($sql){
  include('conexion.php');
  $result = mysqli_query($con,$sql);
  print json_encode($result);
}

function guardarDetalleCotizacion2($sql){
  include('conexion.php');
  $result = mysqli_query($con,$sql);
  print json_encode($result);
}

function guardarDetalleCotizacion3($sql){
  include('conexion.php');
  $result = mysqli_query($con,$sql);
  print json_encode($result);
}

function consultaragLejos($id){
  include('conexion.php'); 
  $sql = "select * from agudeza where id_ficha = '".$id."' and tipo_agudez = 'lejos' and estado = '1' order by tipo_ojo = 'A.O' desc";   
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      $test[] = $row;
      print json_encode($test) ;
  }else{
      print_r (2);
  }    
}

function consultaragLectura($id){
  include('conexion.php'); 
  $sql = "select * from agudeza where id_ficha = '".$id."' and tipo_agudez = 'lectura' and estado = '1' order by tipo_ojo = 'A.O' desc";   
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      $test[] = $row;
      print json_encode($test) ;
  }else{
      print_r (2);
  }    
}


function consultamedidalentactual($id){
  include('conexion.php'); 
  $sql = "SELECT  * FROM medida_lente WHERE id_ficha = '".$id."' AND estado_medida = '1' AND estado = '1'  order by tipo = 'LEJOS' DESC";   
  $result = mysqli_query($con,$sql);
  $result = (mysqli_fetch_assoc($result));
  if($result){
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      $test[] = $row;
      print json_encode($test) ;
  }else{
      print_r (2);
  }    
}