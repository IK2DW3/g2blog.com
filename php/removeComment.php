<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
$id_entrada = $_GET["entrie-id-comment"];
include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("DELETE FROM comentarios WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) {
  // In PHP you can make use of the $_SERVER["HTTP_REFERER"] variable in the header() statement
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
  exit;
} else {
  header("Location: ../index.php");
}
?>
