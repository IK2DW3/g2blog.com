<?php
session_start();
// Inicializar variables
include_once "base_de_datos.php"; // incluimos el archivo de la base de datos
$descripcion = $_POST["textarea-comment"];
$fecha_comentario = date('Y/m/d');
$id_entrada = $_POST["entrie-id-comment"];
$usuarioLogin = $_SESSION['nombre_usuario'];
// Creamos la sentencia SQL
$sentencia = $base_de_datos->prepare("INSERT INTO comentarios(descripcion, fecha_comentario, id_entrada, name_usuario) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$descripcion, $fecha_comentario, $id_entrada, $usuarioLogin]); # Pasar en el mismo orden de los ?
// Crear una variable donde redirigir al usuario
$url = "showEntrie.php?id=$id_entrada";
if($resultado === TRUE) { // Si el resultado es verdadero
  $sentencia = $base_de_datos->prepare("UPDATE `entradas` SET `num_comentarios`= `num_comentarios` + 1 WHERE id = '$id_entrada'");
  $resultado = $sentencia->execute();
  header("Location: $url");
} else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>
