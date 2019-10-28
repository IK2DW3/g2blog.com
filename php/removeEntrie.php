<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM entradas WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
$url = "userSettings.php";
if($resultado === TRUE) header("Location: $url");
else header("Location: ../index.php");
?>
