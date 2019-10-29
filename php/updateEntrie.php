<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];

if(isset($_POST['submitUpdateEntrie'])) {
  include_once "base_de_datos.php";
  $id = $_POST['entrieID'];
  $nuevoTitulo = $_POST['entrieTitle'];
  $nuevoContenido = $_POST['entrieContent'];
  $nuevoCategoria = $_POST['entrieCategori'];
  $consulta= "UPDATE entradas SET titulo = '$nuevoTitulo', descripcion = '$nuevoContenido', categoria = '$nuevoCategoria' WHERE id = '$id' AND name_usuario = '$usuarioLogin'";
  $sentencia= $base_de_datos->query($consulta);
  if ($sentencia == TRUE) {
    header('Location: userSettings.php');
  } else {
    header('Location: ../index.php');
  }
}
$base_de_datos->close();
 ?>
