<?php
// Iniciamos sesion
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];
?>
<?php
// Inicializar variables
$target_dir = "../img/entries/";
$url = "userSettings.php";
include_once "base_de_datos.php"; // incluimos el archivo de conexion con la base de datos

// Si se recoge la opcion del formulario entonces...
if (isset($_POST['submitEntrie'])) {
  // Inicializamos variables
  $titulo = $_POST["entrieTitle"];
  $descripcion = $_POST["entrieContent"];
  $file = $_FILES["entrieImg"];
  $file_name = $_FILES["entrieImg"]["name"];
  $fecha_publicacion = date('Y/m/d');
  $hora_publicacion = date('H:i:s');
  $categoria = $_POST["entrie-categori"];
  $num_comentarios = 0;
  // Si el input donde se recoge el archivono no está vacio entonces...
  if (!(empty($file_name))) {

    $target_dir = $target_dir . basename($file_name);
    $file_temp = $_FILES["entrieImg"]["tmp_name"];
    // Movemos el archivo a la carpeta de destino,   entonces...
    if (move_uploaded_file($file_temp, $target_dir)) {
      // Creamos la sentencia SQL
      $sentencia = $base_de_datos->prepare("INSERT INTO entradas (titulo, descripcion, img_entrada, fecha_publicacion, hora_publicacion, categoria, num_comentarios, name_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
      $resultado = $sentencia->execute([$titulo, $descripcion, $file_name, $fecha_publicacion, $hora_publicacion, $categoria, $num_comentarios, $usuarioLogin]); # Pasar en el mismo orden de los ?
      // Si el resultado el correcto entonces ...
      if ($resultado === TRUE) {
        $sentencia = $base_de_datos->prepare("UPDATE `usuarios` SET `entradas_publicadas`= `entradas_publicadas` + 1 WHERE nombre_usuario = '$usuarioLogin'");
        $resultado = $sentencia->execute();
        header("Location: $url"); // Redirigimos al usuario
      } else{
        header("Location: $url"); // Redirigimos al usuario
      }
      // Si no...
    } else{
      header("Location: $url"); // Redirigimos al usuario
    }
    // Si el input donde se recoge el archivono está vacio entonces...
  } else if (empty($file_name)) {
    // Creamo una sentencia SQL sin el nombre dle archivo
    $sentencia = $base_de_datos->prepare("INSERT INTO entradas (titulo, descripcion, fecha_publicacion, hora_publicacion, categoria, num_comentarios, name_usuario) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $resultado = $sentencia->execute([$titulo, $descripcion, $fecha_publicacion, $hora_publicacion, $categoria, $num_comentarios, $usuarioLogin]); # Pasar en el mismo orden de los ?
    // Si el resultado el correcto entonces ...
    if ($resultado === TRUE) {
      $sentencia = $base_de_datos->prepare("UPDATE `usuarios` SET `entradas_publicadas`= `entradas_publicadas` + 1 WHERE nombre_usuario = '$usuarioLogin'");
      $resultado = $sentencia->execute();
      header("Location: $url"); // Redirigimos al usuario
    } else{ // Si no...
      header("Location: $url"); // Redirigimos al usuario
    }

  }

}
// Cerramos conexion con la base de datos
$base_de_datos->close();
?>
