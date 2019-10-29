<?php
session_start();
include_once "base_de_datos.php";

$nombreUsuario = $_POST['nombreDeUsuario'];
$password = $_POST['confirmPassword'];

$stmt = $base_de_datos->prepare("SELECT nombre_usuario, password FROM usuarios WHERE nombre_usuario = '$nombreUsuario'");
$stmt->bindParam('s',$nombreUsuario);
$stmt->bindParam('p', $password);
$stmt->execute();
$results = $stmt->fetch();
if($stmt->rowCount() > 0 ){
  if (password_verify($password, $results[1])) {
    $_SESSION['nombre_usuario'] = $nombreUsuario;
    header('Location: ../index.php');
  } else {
    header('Location: login.php');
  }
}else{
  header('Location: login.php');
}
$base_de_datos = null;
?>
