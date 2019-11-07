<?php
// Si no se recive ninguna id entonces...
if(!isset($_GET["id"])) exit();
// Inicializar variables
$id = $_GET["id"];
$url = "userSettings.php";
// incluimos la base de datos
include_once "base_de_datos.php";
// Preparamos la sentencia SQL
$sentencia = $base_de_datos->prepare("DELETE FROM entradas WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
// Si el resultado es correcto entonces...
if($resultado === TRUE) header("Location: $url");
// Si no...
else header("Location: ../index.php");
?>
