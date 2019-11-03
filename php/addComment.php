<?php
session_start();

// Inicializar variables
include_once "base_de_datos.php";
$descripcion = $_POST["textarea-comment"];
$fecha_comentario = date('Y/m/d');
$id_entrada = $_POST["entrie-id-comment"];
$usuarioLogin = $_SESSION['nombre_usuario'];

$sentencia = $base_de_datos->prepare("INSERT INTO comentarios(descripcion, fecha_comentario, id_entrada, name_usuario) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$descripcion, $fecha_comentario, $id_entrada, $usuarioLogin]); # Pasar en el mismo orden de los ?

$url = "showEntrie.php?id=$id_entrada";
if($resultado === TRUE) header("Location: $url");
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>
