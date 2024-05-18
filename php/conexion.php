<?php
$con =new mysqli("localhost","root","12345678","optica"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	} /* else{
		echo 'conexion correcta';
	}  */
?>

