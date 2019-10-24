<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];

if(isset($_POST['submitName'])) {
  include_once "base_de_datos.php";
  $consulta= "SELECT * FROM usuarios";
  $sentencia= $base_de_datos->query($consulta);
  $results = $sentencia->fetchAll(PDO::FETCH_OBJ);
  $nuevoNombre = $_POST["usuarioCambiar"];

  foreach ($results as $resultados) {
    if ($nuevoNombre == $resultados->nombre_usuario) {
      header('Location: userSettings.php');
      break;
    } else {
      if ($_POST["passwordVieja"] == $resultados->password) {
        $consulta= "UPDATE usuarios SET nombre_usuario = '$nuevoNombre' WHERE nombre_usuario = '$usuarioLogin'";
        $sentencia= $base_de_datos->query($consulta);
        header('Location: logout.php');
      } else {
        header('Location: userSettings.php');
      }
    }
  }
}
$base_de_datos->close();
?>
