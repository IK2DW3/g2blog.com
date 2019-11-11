<?php
// Si no se recive ninguna id entonces...
if(!isset($_GET["id"])) exit();
// Inicializar variables
$id = $_GET["id"];
// incluimos la base de datos
include_once "base_de_datos.php";
// Preparamos la sentencia SQL
$sentencia = $base_de_datos->prepare("DELETE FROM `comentarios` WHERE `id_entrada` = ?;");
$resultado = $sentencia->execute([$id]);
$sentencia = $base_de_datos->prepare("DELETE FROM `entradas` WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
// Si el resultado es correcto entonces...
$url = "userSettings.php";
if($resultado === TRUE) {
  // header("Location: $url");
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
} else {
  // Si no...
  header("Location: ../index.php");
}
?>
