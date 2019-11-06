<?php
// Inicio de la sesion
session_start();
?>
<!DOCTYPE html> <!-- Inicio del HTML 5 -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link rel="stylesheet" href="../css/style.css" class="css"> <!-- Website Stylesheet -->
  <title>G2BLOG - Login</title> <!-- Website title -->
  <!-- Icon pack link https://ionicons.com/ -->
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
  <!-- Validacion login-->
  <script src="../js/app.js"></script>
</head>
<!-- Inicio del body -->
<body>
  <!-- Inicio de la cabecera-->
  <header class="header" id="header">
    <a class="a-logo" href="../index.php"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
    <a class="a-title" href="../index.php">G2BLOG</a>
    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="entries.php">Entradas</a></li>
        <li><a class="a-buttom" href="register.php">Registrarse</a></li>
      </ul>
    </nav>
  </header>
  <!-- Fin de la cabecera -->
  <!-- Inicio del pop up -->
  <div class="pop-container" id="pop-container">
    <div class="apop pop" id="pop">
      <div class="icon" id="icon">
      </div>
      <p id="text"></p>
    </div>
  </div>
  <!-- Fin del pop up -->
  <!-- Inicio del formulario -->
  <form name="fPrincipal" class="fPrincipal" id="fPrincipal" action="confirmacionLogin.php" onsubmit="return validacionLogin()" method="post">
    <img src="../img/iconlogo.png" alt="G2BLOG">
    <h2>Login</h2>
    <label class="labelInput" for="nombreDeUsuario">Usuario o Email</label>
    <input type="text" name="nombreDeUsuario" class="placeicon" id="nombreDeUsuario" placeholder="Usuario/email..." autocomplete="off">
    <label class="labelInput" for="confirmPassword">Contraseña</label>
    <input type="password" name="confirmPassword" class="placeicon" id="confirmPassword" placeholder=" Contraseña..." >
    <input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
    <div class="local-storage">
      <input type="checkbox" name="storage" id="local-storage" value="remember">
      <label for="storage">Recordar usuario</label>
    </div>
    <input type="submit" name="mandar" id="entrar" value="ACCEDER">
    <a class="link" href="#">¿Contraseña olvidada?</a>
  </form>
  <!-- Inicio delformulario -->
  <?php
  // incluimos el footer
  include_once "layoutFooter.php";
  ?>
</body>
<!-- Fin del body -->
</html>
<!-- Fin del HTML 5 -->
