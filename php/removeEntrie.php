<?php
// Iniciamos sesion
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];
?>
<?php
// Si no se recive ninguna id entonces...
if(!isset($_GET["id"])) exit();
// Inicializar variables
$id = $_GET["id"];
// incluimos la base de datos
include_once "base_de_datos.php";
// Preparamos la sentencia SQL
$sentencia = $base_de_datos->prepare("UPDATE `usuarios` SET `entradas_publicadas` = `entradas_publicadas` - 1 WHERE nombre_usuario = (SELECT `entradas`.name_usuario FROM entradas WHERE `entradas`.id = ?)");
$resultado = $sentencia->execute([$id]);
$sentencia = $base_de_datos->prepare("DELETE FROM `comentarios` WHERE `id_entrada` = ?;");
$resultado = $sentencia->execute([$id]);
$sentencia = $base_de_datos->prepare("DELETE FROM `entradas` WHERE id = ?;");
$resultado = $sentencia->execute([$id]);

// Si el resultado es correcto entonces...
$url = "userSettings.php";
if($resultado === TRUE) {
  // header("Location: $url");
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
} else {
  // Si no...
  header("Location: ../index.php");
}

/*
UPDATE `usuarios` SET `entradas_publicadas`= `entradas_publicadas` - 1  WHERE `nombre_usuario` = (SELECT usuarios.*, entradas.* FROM usuarios LEFT JOIN `entradas` ON `entradas`.`name_usuario` = `usuarios`.`Admin`);

//
UPDATE `usuarios` SET `entradas_publicadas`= `entradas_publicadas` - 1  WHERE `nombre_usuario` = (

SELECT `entradas`.`id`, `usuarios`.`nombre_usuario`, `entradas`.`name_usuario`
FROM `usuarios`
    LEFT JOIN `entradas` ON `entradas`.`name_usuario` = `usuarios`.`nombre_usuario`

);


SELECT `entradas`.`id`, `usuarios`.`nombre_usuario`, `entradas`.`name_usuario`
FROM `usuarios`
    LEFT JOIN `entradas` ON `entradas`.`name_usuario` = `usuarios`.`nombre_usuario`

*/

/*
UPDATE `usuarios` SET `entradas_publicadas`= `entradas_publicadas` - 1 WHERE nombre_usuario = (SELECT `entradas`.name_usuario FROM entradas WHERE `id` = 1)
*/
?>
