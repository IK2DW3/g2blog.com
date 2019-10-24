<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link rel="stylesheet" href="../css/index.css" class="css"> <!-- Website Stylesheet -->
  <script src="../js/profileSettings.js"></script>
  <title><?php echo "G2BLOG - Perfil ".$usuarioLogin; ?></title>
</head>
<body>
  <header class="header" id="header">
    <a class="a-logo" href="index.php"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
    <h1><a class="a-title" href="../index.php">G2BLOG</a></h1>
    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="php/entradas.php">Entradas</a></li>
        <li><a class="a-buttom" href="logout.php">Log out</a></li>
      </ul>
    </nav>
  </header>

  <div class="panelUsuario">
    <aside class="user-aside">
      <div class="user-icon">
        <?php
        include_once "base_de_datos.php";
        $consulta= "SELECT nombre, apellidos, tipo_usuario, email, img_avatar FROM usuarios WHERE nombre_usuario = '$usuarioLogin'";
        $sentencia= $base_de_datos->query($consulta);
        if ($sentencia == TRUE ) {
          $results = $sentencia->fetch();
          if (!$results[0] == '') {
            echo ("<img src=../img/$results[4]>");
          } else {
            echo ("<img src='../img/contact.png'>");
          }
        } else {
          echo ("<img src='../img/contact.png'>");
        }
        ?>
        <h2><?php if ($usuarioLogin == "") {echo ("Undefined");} else {echo ("Hey, ".$usuarioLogin);} ?></h2>
      </div>
      <nav class="user-nav">
        <ul>
          <li id="Opcion1"><a href="#">Perfil / Cuenta</a></li>
          <li id="Opcion2"><a href="#">Mis publicaciones</a></li>
          <?php if ($results[2] == "Administrador") { ?>
          <li id="Opcion3"><a href="#">Usuario</a></li>
          <li id="Opcion4"><a href="#">Entradas</a></li>
          <?php
          }?>
        </ul>
      </nav>
    </aside>
    <section class="user-account" id="user-account">
      <form class="user-data-form" action="updateUsername.php" method="post">
        <legend>Mis datos</legend>
        <label for="usuarioCambiar">Nombre de usuario</label>
        <input type="text" name="usuarioCambiar" value="<?php echo ($_SESSION['nombre_usuario']); ?>" autocomplete="off">
        <label for="nombreCambiar">Email</label>
        <input type="email" name="emailNuevo" value="<?php echo ($results[3]); ?>" readonly>
        <label for="nombreCambiar">Nombre</label>
        <input type="text" name="nombreCambiar" value="<?php echo ($results[0]); ?>" readonly>
        <label for="apellidosCambiar">Apellidos</label>
        <input type="text" name="apellidosCambiar" value="<?php echo ($results[1]); ?>" readonly>
        <label for="passwordVieja">Contraseña actual</label>
        <p class="subText">Ingresa tu contraseña actual para verificar los cambios</p>
        <input type="password" name="passwordVieja" value="">
        <input type="submit" name="submitName" value="Actualizar">
      </form>

      <form class="user-avar-form" action="uploadAvatar.php" method="post" enctype="multipart/form-data">
        <legend>Cambiar avatar</legend>
        <label for="cambiarAvatar">Subir imagen avatar</label>
        <input type="file" name="cambiarAvatar" id="cambiarAvatar" accept=".jpg, .jpeg, .png">
        <div class="preview" id="preview">
          <p>No se ha seleccionado ningun archivo</p>
        </div>
        <input type="submit" name="submitAvatar" value="Cambiar">
      </form>

      <form class="user-secu-form" action="updatePassword.php" method="post">
        <legend>Cambiar contraseña</legend>
        <label for="passwordVieja">Contraseña actual</label>
        <input type="password" name="passwordVieja" value="">
        <label for="passwordNueva">Contraseña nueva</label>
        <input type="password" name="passwordNueva" value="">
        <label for="confirmarPasswordNueva">Confirmar contraseña</label>
        <input type="password" name="confirmarPasswordNueva" value="">
        <input type="submit" name="submitPassword" value="Actualizar">
      </form>
    </section>

    <section class="user-entries" id="user-entries">
      <h2>Prueba</h2>
    </section>
  </div>

  <footer class="footer">
    <p>Con la tecnología de nuestra imaginación</p>
  </footer>
</body>
</html>
