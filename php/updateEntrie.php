<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];

if(isset($_POST['submitUpdateEntrie'])) {
  include_once "base_de_datos.php";
  $nuevoTitulo = $_POST["input-field-edit"];
  $nuevoContenido = $_POST["input-textarea-edit"];
  $nuevoCategoria = $_POST["entrie-categori-edit"];
  $consulta= "UPDATE entradas SET `titulo` = '$nuevoTitulo' WHERE `name_usuario` = '$usuarioLogin'";
  $sentencia= $base_de_datos->query($consulta);
  if ($sentencia == TRUE) {
    header('Location: userSettings.php');
  } else {
    header('Location: ../index.php');
  }
}
$base_de_datos->close();
 ?>
