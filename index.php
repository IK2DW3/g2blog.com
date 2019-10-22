<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet"> <!-- Icon pack link https://ionicons.com/ -->
  <link rel="stylesheet" href="css/index.css" class="css"> <!-- Website Stylesheet -->
  <script src="js/interaccionesUsuario.js"></script>
  <title>G2BLOG - Inicio</title> <!-- Website title -->
</head>

<body>
  <header class="header" id="header">
    <a class="a-logo" href="index.php"><img src="img/iconlogo.png" alt="G2BLOG"></a>
    <h1><a class="a-title" href="index.php">G2BLOG</a></h1>

    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a class="highlight" href="index.php">Inicio</a></li>
        <li><a href="php/entradas.php">Entradas</a></li>
        <?php if(empty($_SESSION['nombre_usuario'])) { ?>
        <li><a class="a-buttom" href="php/login.php">Log in</a></li>
        <li><a class="a-buttom" href="php/register.php">Registrarse</a></li>
        <?php } else { ?>
        <div class="dropdown">
          <button type="button" class="buttonDropdown" id="dropdownMenuButton" ><?php echo ("Hey, ".$_SESSION['nombre_usuario']); ?></button>
          <div class="dropdown-menu" id="dropdown-menu">
            <ul>
              <li><a href="php/userSettings.php">Mi perfil</a></li>
              <li><a href="php/logout.php">Desconectar</a></li>
            </ul>
          </div>
        </div>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <div class="container">
    <section class="entries">
      <h2>Ultimas publicaciones</h2>
    </section>
    <aside class="aside-bar">
      <div class="searchbox">
        <input type="text" name="searchfield" placeholder="Buscar...">
      </div>
      <h3>Categorías</h3>
      <nav class="aside-nav">
        <ul>
          <li><a href="#">Informática</a></li>
          <li><a href="#">Off-Topics</a></li>
        </ul>
      </nav>
    </aside>
  </div>
  <footer class="footer">
    <p>Con la tecnología de nuestra imaginación</p>
  </footer>

  <script>
  function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }
  </script>

</body>

</html>
