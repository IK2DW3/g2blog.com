<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["name"]) || !isset($_POST["surname"]) || !isset($_POST["username"]) || !isset($_POST["password"])
|| !isset($_POST["sex[]"])) exit();
#Si todo va bien, se ejecuta esta parte del código...
include_once "base_de_datos.php";
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$password = $_POST["password"];
$sex = $_POST["sex[]"];
$number = $_POST["number"];

/*
	Al incluir el archivo "base_de_datos.php", todas sus variables están
	a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
	copiado y pegado el código
*/
$sentencia = $base_de_datos->prepare("INSERT INTO usuarios(nombre_usuario, password, nombre, apellidos, num_telefono, sexo) VALUES (?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$username, $password, $name, $surname, $number, $sex]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar
if($resultado === TRUE) echo "Insertado correctamente";
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>
