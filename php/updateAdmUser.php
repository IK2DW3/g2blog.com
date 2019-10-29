<?php
if(isset($_POST['adm-submitEditUser'])) {
  include_once "base_de_datos.php";

  $consulta= "SELECT * FROM usuarios";
  $sentencia= $base_de_datos->query($consulta);
  $results = $sentencia->fetchAll(PDO::FETCH_OBJ);

  $nuevoUsername = $_POST['usernameEdit'];
  $nuevaContraseña = md5($_POST['userPasswordEdit']);
  $nuevoTipo = $_POST['user-type'];
  $nuevoEmail = $_POST['emailEdit'];
  $nuevoNombre = $_POST['nameEdit'];
  $nuevoApellido = $_POST['surnameEdit'];
  $nuevaFechanacimiento = $_POST['dateEdit'];
  $nuevoGenero = $_POST['sexEdit'];


  foreach ($results as $resultados) {
    if ($nuevoUsername == $resultados->nombre_usuario) {
      $consulta= "UPDATE usuarios SET nombre_usuario = '$nuevoUsername', password = '$nuevaContraseña', tipo_usuario = '$nuevoTipo', email = '$nuevoEmail', nombre = '$nuevoNombre', apellidos = '$nuevoApellido', fecha_nacimiento = '$nuevaFechanacimiento', sexo = '$nuevoGenero' WHERE nombre_usuario = '$nuevoUsername'";
      $sentencia= $base_de_datos->query($consulta);
      header('Location: userSettings.php');  
    }
  }

}
$base_de_datos->close();
 ?>
