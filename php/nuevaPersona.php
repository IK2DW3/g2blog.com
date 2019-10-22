<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["usernameregister"]) || !isset($_POST["passwordregister"]) || !isset($_POST["email"]) || !isset($_POST["name"]) || !isset($_POST["surname"])
 || !isset($_POST["sexo"])) exit();
#Si todo va bien, se ejecuta esta parte del código...
include_once "base_de_datos.php";
$username = $_POST["usernameRegister"];
$password = $_POST["confirmPassword"];
$tipo = "Usuario";
$email = $_POST["email"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$date = $_POST["date"];
$sexo = $_POST["sexo"];
$terminos = $_POST["terminosCondiciones"];
$entradas = 0;
$fechaCreacion = date('Y/m/d');

/*
	Al incluir el archivo "base_de_datos.php", todas sus variables están
	a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
	copiado y pegado el código
*/
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
