<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];

if(isset($_POST['submitPassword'])) {
  include_once "base_de_datos.php";
  $consulta= "SELECT password FROM usuarios WHERE nombre_usuario = '$usuarioLogin'";
  $sentencia= $base_de_datos->query($consulta);
  $results = $sentencia->fetch();

  if (!md5($_POST['passwordVieja']) == $results ) {
    header('Location: userSettings.php');
  } else {
    if ($_POST['passwordNueva'] == '' || $_POST['confirmarPasswordNueva'] == '') {
      header('Location: userSettings.php');
    } else if ($_POST['passwordVieja'] == $_POST['passwordNueva'] && $_POST['passwordVieja'] == $_POST['confirmarPasswordNueva']) {
      header('Location: userSettings.php');
    } else if ($_POST['passwordNueva'] == $_POST['confirmarPasswordNueva']) {
      $nuevaContrasena = md5($_POST['passwordNueva']);
      $consulta= "UPDATE usuarios SET password = '$nuevaContrasena' WHERE nombre_usuario = '$usuarioLogin'";
      $sentencia= $base_de_datos->query($consulta);
      header('Location: logout.php');
    } else {
      header('Location: userSettings.php');
    }
  }
}
$base_de_datos->close();
?>
