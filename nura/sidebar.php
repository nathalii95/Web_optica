<?php

session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
	include_once("../php/conexion.php");  
    $nombre = $_SESSION['cargo'];
	$tipo_usuario = $_SESSION['fk_cargo'];

	?>
   
   <!-- Left Sidebar -->
     <div class="left main-sidebar">

<div class="sidebar-inner leftscroll">

    <div id="sidebar-menu">

        <ul>

            <li class="submenu">
             <a class="pro" href="index.php"><i class="fas fa-home"></i><span> Inicio</span> </a>
            </li>
            <?php if($tipo_usuario != 3  ) { ?>
            <li class="submenu">
                <a href="#"><i class="far fa-calendar-alt"></i> <span> Agendamiento </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="cita.php"><i class="far fa-calendar-check"></i>Citas</a></li>
                   <!--  <li><a href=""><i class="fas fa-file"></i>Reporte Fecha</a></li> -->
                </ul>
            </li><?php } ?>
          <!--  <li class="submenu">
                <a href="paciente.php"><i class="fas fa-user"></i><span> Paciente </span> </a>
            </li>-->
            
            <li class="submenu">
                <a href="#"><i class="fas fa-user"></i> <span> Paciente </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="paciente.php"><i class="fas fa-file-signature"></i>Ingreso</a></li>
                    <li><a href="fichaPaciente.php"><i class="fas fa-file-invoice"></i>Ficha</a></li>
                </ul>
            </li>   
            <?php if($tipo_usuario != 2  ) { ?>
            <li class="submenu">
                <a  href="enfermedad.php"><i class="fas fa-disease"></i><span> Enfermedad </span> </a>
            </li>  <?php } ?>
       
            

            <?php if($tipo_usuario == 1  ) { ?>
                <li class="submenu">
                <a  href="empleado.php"><i class="far fa-user"></i><span> Empleado </span> </a>
            </li>

            <li class="submenu">
                <a  href="cargo.php"><i class="fas fa-clipboard"></i><span> Cargo </span> </a>
            </li>
            <?php } ?> 
            
            <?php if($tipo_usuario != 3  ) { ?>
            <li class="submenu">
                <a  href="#"><i class="fas fa-box-open"></i><span> Inventario </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="TipoProducto.php"><i class="fab fa-product-hunt"></i>Tipo Producto</a></li>
                    <li><a href="inventario.php"><i class="fas fa-tags"></i> Ingreso</a></li>
                </ul>
            </li>
            <?php } ?>
        </ul>

        <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>

</div>

</div>
<!-- End Sidebar -->
