<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];
?>
<?php
 $target_dir = "../img/";
 if(isset($_POST['submitAvatar'])) {
   $file_name = $_FILES["cambiarAvatar"]["name"];
   if(!empty($_FILES["cambiarAvatar"])) {
     $target_dir = $target_dir . basename($file_name);
     $file_temp = $_FILES["cambiarAvatar"]["tmp_name"];
     if(move_uploaded_file($file_temp, $target_dir)) {
       echo "The file ".  basename($file_name). " has been uploaded";
       include_once "base_de_datos.php";
       $consulta= "UPDATE usuarios SET img_avatar = '$file_name' WHERE nombre_usuario = '$usuarioLogin'";
       $sentencia= $base_de_datos->query($consulta);
       header('Location: userSettings.php');
     } else{
       echo "There was an error uploading the file, please try again!";
     }
   }
 }
$base_de_datos->close();
?>