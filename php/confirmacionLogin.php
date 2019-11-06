<?php
// Iniciamos sesion
session_start();
include_once "base_de_datos.php"; // Incluimos el archivo de la base de datos
// inicializamos las variables
$nombreUsuario = $_POST['nombreDeUsuario'];
$password = $_POST['confirmPassword'];
$email = $_POST['nombreDeUsuario'];
// Creamos la sentencia SQL
$stmt = $base_de_datos->prepare("SELECT nombre_usuario, password, email FROM usuarios WHERE nombre_usuario = '$nombreUsuario' OR email = '$email'");
$stmt->bindParam('s',$nombreUsuario);
$stmt->bindParam('p',$password);
$stmt->bindParam('e',$email);
$stmt->execute();
$results = $stmt->fetch(); // obtenemos los datos en forma de array
// Si se encuantra mas de una columna entonces...
if($stmt->rowCount() > 0 ){
  if ($results[2] == $email && password_verify($password, $results[1])) {
    $_SESSION['nombre_usuario'] = $results[0];
    header('Location: ../index.php');
  } else if (password_verify($password, $results[1])) {
    $_SESSION['nombre_usuario'] = $results[0];
    header('Location: ../index.php');
  } else {
    header('Location: login.php');
  }
} else{ // Si no...
  header('Location: login.php');
}
$base_de_datos = null;
?>
