<?php  

if (isser($_POST['ingresar'])) {
	$servename = "localhost";
	$username = "root";
	$password = "";
	$dbname = "inventory_control_co";

	$conn = new mysqli($servename,$username,$password,$dbname);
	$sql = "SELECT `correo electronico`, `contrasena` FROM `usuarios` WHERE correo electronico = '".$POST['usuario']."' ";
}

?>