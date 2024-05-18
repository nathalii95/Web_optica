<?php
	session_start();
	if(!isset($_SESSION['id_empleado'])){
		header("Location:../index.php");
	}
	$nombre = $_SESSION['nombre'];
    $cargo = $_SESSION['cargo'];
	$tipo_usuario = $_SESSION['fk_cargo'];
?>
 <!-- top bar navigation -->
 <div class="headerbar">

<!-- LOGO -->
<div class="headerbar-left">
    <a href="index.php" class="logo"><!-- <img alt="Logo" src="assets/images/logo.png" /> --><i class="fas fa-eye"></i> <span style="font-weight: bold;">Optica</span></a>
</div>

<nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">
        <li class="list-inline-item dropdown notif">
            <p style="font-weight: bold;text-transform: uppercase;color:white;"><?php echo $cargo; ?></p>         
        </li>
        <li class="list-inline-item dropdown notif">
            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <!-- <img src="assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">-->
                <i class="far fa-user avatar-rounded" alt="Profile image" ></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="text-overflow"><small>Hello, <?php echo $nombre; ?></small> </h5>
                </div>
                <!-- item-->
               <!--  <a href="pro-profile.html" class="dropdown-item notify-item">
                    <i class="fa fa-user"></i> <span>Perfil</span>
                </a> -->

                <!-- item-->
                <a href="salir.php" class="dropdown-item notify-item">
                    <i class="fa fa-power-off"></i> <span>Salir</span>
                </a>
            </div>
        </li>
    </ul>
    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
        </li>
    </ul>
</nav>
</div>
<!-- End Navigation -->