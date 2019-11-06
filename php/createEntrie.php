<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];
?>
<?php
// Inicializar variables
$target_dir = "../img/entries/";
$url = "userSettings.php";
include_once "base_de_datos.php";

if (isset($_POST['submitEntrie'])) {

  $titulo = $_POST["entrieTitle"];
  $descripcion = $_POST["entrieContent"];
  $file = $_FILES["entrieImg"];
  $file_name = $_FILES["entrieImg"]["name"];
  $fecha_publicacion = date('Y/m/d');
  $hora_publicacion = date('H:i:s');
  $categoria = $_POST["entrie-categori"];
  $num_comentarios = 0;

  if (!(empty($file_name))) {

    $target_dir = $target_dir . basename($file_name);
    $file_temp = $_FILES["entrieImg"]["tmp_name"];

    if (move_uploaded_file($file_temp, $target_dir)) {

      $sentencia = $base_de_datos->prepare("INSERT INTO entradas (titulo, descripcion, img_entrada, fecha_publicacion, hora_publicacion, categoria, num_comentarios, name_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
      $resultado = $sentencia->execute([$titulo, $descripcion, $file_name, $fecha_publicacion, $hora_publicacion, $categoria, $num_comentarios, $usuarioLogin]); # Pasar en el mismo orden de los ?

      if ($resultado === TRUE) {
        $sentencia = $base_de_datos->prepare("UPDATE `usuarios` SET `entradas_publicadas`= +1 WHERE nombre_usuario = '$usuarioLogin'");
        $resultado = $sentencia->execute();
        header("Location: $url");
      } else{
        header("Location: $url");
      }

    } else{
      header("Location: $url");
    }

  } else if (empty($file_name)) {

    $sentencia = $base_de_datos->prepare("INSERT INTO entradas (titulo, descripcion, fecha_publicacion, hora_publicacion, categoria, num_comentarios, name_usuario) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $resultado = $sentencia->execute([$titulo, $descripcion, $fecha_publicacion, $hora_publicacion, $categoria, $num_comentarios, $usuarioLogin]); # Pasar en el mismo orden de los ?

    if ($resultado === TRUE) {
      $sentencia = $base_de_datos->prepare("UPDATE `usuarios` SET `entradas_publicadas`= +1 WHERE nombre_usuario = '$usuarioLogin'");
      $resultado = $sentencia->execute();
      header("Location: $url");
    } else{
      //header("Location: $url");
    }

  }

}

$base_de_datos->close();
?>
