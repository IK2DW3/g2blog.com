<?php
if(isset($_POST['adm-submitEntrie'])) {
  include_once "base_de_datos.php";
  $id = $_POST['adm-entrieID'];
  $nuevoTitulo = $_POST['adm-entrieTitle'];
  $nuevoContenido = $_POST['adm-entrieContent'];
  $nuevoCategoria = $_POST['adm-entrie-categori'];
  $nuevaFecha = $_POST['adm-entrie-dateEdit'];
  $nuevoUsuario = $_POST['adm-user-publi'];

  $consulta= "UPDATE entradas SET id = '$id', titulo = '$nuevoTitulo', descripcion = '$nuevoContenido', fecha_publicacion = '$nuevaFecha', categoria = '$nuevoCategoria', name_usuario = '$nuevoUsuario'  WHERE id = '$id'";
  $sentencia= $base_de_datos->query($consulta);
  if ($sentencia == TRUE) {
    header('Location: userSettings.php');
  } else {
    header('Location: ../index.php');
  }
}
$base_de_datos->close();
 ?>
