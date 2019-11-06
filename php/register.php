<!DOCTYPE html> <!-- Inicio del HTML 5 -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link rel="stylesheet" href="../css/style.css" class="css"> <!-- Website Stylesheet -->
  <title>G2BLOG - Registrarse</title>
  <!-- Icon pack link https://ionicons.com/ -->
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
  <!-- Validacion registro-->
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
        <li><a class="a-buttom" href="login.php">Log in</a></li>
      </ul>
    </nav>
  </header>
  <!-- Fin de la cabecera-->
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
  <form class="formulario-registro" name="formulario-registro" action="nuevaPersona.php" onsubmit="return validacion()" method="post">
    <fieldset>
      <legend>Formulario De Registro</legend>
      <input type="text" name="name" id="name" placeholder="Nombre..." value="" autocomplete="off">
      <input type="text" name="surname" id="surname" placeholder="Apellido(s)..." value="" autocomplete="off">
      <input type="text" name="usernameRegister" id="usernameRegister" placeholder="Usuario..." value="" autocomplete="off">
      <input type="password" name="passwordRegister" id="passwordRegister" placeholder="Contraseña..." value="" autocomplete="off">
      <br>
      <input type="email" name="email" id="email" placeholder="Email..." value="" autocomplete="off">
      <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmar contraseña..." value="">
      <br>
      <input type="date" name="date" id="date" value="1960-01-01" min="1960-01-01" max="2003-12-31" required>
      <input type="radio" name="sexo" value="W" id="radio-one" class="form-radio" ><label for="radio-one">Mujer</label>
      <input type="radio" name="sexo" value="M" id="radio-two" class="form-radio" ><label for="radio-two">Hombre</label>
      <br>
      <input type="checkbox" name="terminosCondiciones" id="terminosCondiciones" class="form-checkbox" value="Yes"><label>He leído los <a href="">Terminos & condiciones</a>.</label>
      <input type="submit" name="submit" value="Registrarse">
    </fieldset>
    <div class="loginquest">
      <a href="login.php">¿Ya tienes una cuenta?</a>
    </div>
  </form>
  <!-- Fin del formulario -->
  <?php
  // incluimos el footer
  include_once "layoutFooter.php";
  ?>
</body>
<!-- Fin del body -->
</html>
<!-- Fin del HTML 5 -->
