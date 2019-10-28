<?php
session_start();
?>
<!DOCTYPE html>
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
  <script src="../js/validacion-registro.js"></script>
</head>
<body>
  <header class="header" id="header">
    <a class="a-logo" href="../index.php"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
    <h1><a class="a-title" href="../index.php">G2BLOG</a></h1>
  </header>
  <div class="pop-container" id="pop-container">
    <div class="pop" id="pop">
      <div class="icon" id="icon">
      </div>
      <p id="text"></p>
    </div>
  </div>
  <form name="fPrincipal" class="fPrincipal" id="fPrincipal" action="confirmacionLogin.php" onsubmit="return validacionLogin()" method="post">
    <img src="../img/iconlogo.png" alt="G2BLOG">
    <h2>Login</h2>
    <label class="labelInput" for="nombreDeUsuario">Usuario o Email</label>
    <input type="text" name="nombreDeUsuario" class="placeicon" id="nombreDeUsuario" placeholder="Usuario/email..." autocomplete="off">
    <label class="labelInput" for="confirmPassword">Contraseña</label>
    <input type="password" name="confirmPassword" class="placeicon" id="confirmPassword" placeholder=" Contraseña..." >
    <input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
    <input type="submit" name="mandar" value="ACCEDER">
    <a class="link" href="#">¿Contraseña olvidada?</a>
  </form>
  <footer class="footer">
    <p>Con la tecnología de nuestra imaginación</p>
  </footer>
</body>
</html>
