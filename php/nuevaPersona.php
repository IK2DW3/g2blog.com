<?php
// Inicializar variables
include_once "base_de_datos.php";
$username = $_POST["usernameRegister"];
$password = $_POST["confirmPassword"];
$password = md5($password); // Encryptar contraseña
$tipo = "Usuario";
$email = $_POST["email"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$date = $_POST["date"];
$sexo = $_POST["sexo"];
$terminos = $_POST["terminosCondiciones"];
$entradas = 0;
$fechaCreacion = date('Y/m/d');

$sentencia = $base_de_datos->prepare("INSERT INTO usuarios(nombre_usuario, password, tipo_usuario, email, nombre, apellidos, fecha_nacimiento, sexo, terminos_condi, entradas_publicadas, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$username, $password, $tipo, $email, $name, $surname, $date, $sexo, $terminos, $entradas, $fechaCreacion]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar
#if($resultado === TRUE) echo "Insertado correctamente";
#header("Location: true.html");
$url = "../index.php";
if($resultado === TRUE) header("Location: $url");
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>
