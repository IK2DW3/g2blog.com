<?php
// Inicializar variables
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "bdg2blog";
// intentamos conectarnos a la base de datos
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>
