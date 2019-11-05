<?php
session_start();

// Inicializar variables
include_once "base_de_datos.php";
$titulo = $_POST["entrieTitle"];
$descripcion = $_POST["entrieContent"];
$fecha_publicacion = date('Y/m/d');
$hora_publicacion = date('h:i:sa');
$categoria = $_POST["entrie-categori"];
$num_comentarios = 0;
$usuarioLogin = $_SESSION['nombre_usuario'];

$sentencia = $base_de_datos->prepare("INSERT INTO entradas(titulo, descripcion, fecha_publicacion, hora_publicacion, categoria, num_comentarios, name_usuario) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$titulo, $descripcion, $fecha_publicacion, $hora_publicacion, $categoria, $num_comentarios, $usuarioLogin]); # Pasar en el mismo orden de los ?

$url = "userSettings.php";
if($resultado === TRUE) {
  $sentencia = $base_de_datos->prepare("UPDATE `usuarios` SET `entradas_publicadas`= +1 WHERE nombre_usuario = '$usuarioLogin'");
  $resultado = $sentencia->execute();
  header("Location: $url");
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>
