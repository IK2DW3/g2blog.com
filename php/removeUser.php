<?php
// Si no se recive ningun nombre entonces...
if(!isset($_GET["nombre_usuario"])) exit();
// Inicializar variables
$nombre_usuario = $_GET["nombre_usuario"];
$url = "userSettings.php";
// Si el nombre de usuario es administrador global entnces...
if ($nombre_usuario == "Admin") {
  exit();
}
// Incluimos el archivo de base de datos
include_once "base_de_datos.php";
// Preparamos la sentencia SQL
$sentencia = $base_de_datos->prepare("DELETE FROM usuarios WHERE nombre_usuario = ?;");
$resultado = $sentencia->execute([$nombre_usuario]);
// Si es correcto entonces...
if($resultado === TRUE) header("Location: $url");
// Si no...
else header("Location: ../index.php");
?>
