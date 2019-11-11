<?php
// inicio de la sesion
session_start();
 ?>
<!DOCTYPE html>  <!-- Inicio del HTML 5 -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link rel="stylesheet" href="css/style.css" class="css"> <!-- Website Stylesheet -->
  <!-- Icon pack link https://ionicons.com/ -->
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
  <script src="js/app.js"></script>
  <title>G2BLOG - Inicio</title> <!-- Website title -->
</head>
<!-- Inicio del body -->
<body>
  <!-- Inicio de la cabecera -->
  <header class="header" id="header">
    <a class="a-logo" href="index.php"><img src="img/iconlogo.png" alt="G2BLOG"></a>
    <a class="a-title" href="index.php">G2BLOG</a>
    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a class="highlight" href="index.php">Inicio</a></li>
        <li><a href="php/entries.php">Entradas</a></li>
        <?php if(empty($_SESSION['nombre_usuario'])) { ?>
        <li><a class="a-buttom" href="php/login.php">Log in</a></li>
        <li><a class="a-buttom" href="php/register.php">Registrarse</a></li>
        <?php } else { ?>
        <li class="a buttonDropdown" id="dropdownMenuButton"><?php echo ("Hey! &#128276 &#9660"); ?>
          <ul class="dropdown" id="dropdown">
            <li><a href="php/userSettings.php">Mi perfil</a></li>
            <li><a id="modo" href="#">Modo noche</a></li>
            <li><a href="php/logout.php">Desconectar</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <!-- Fin de la cabecera -->
  <!-- Inicio del contenedor principal -->
  <div class="principal">
    <article class="principal-article">
      <h1>Este es el blog de tus pensamientos</h1>
      <p>¡Aquí podrás expresar tus conocimientos con las demás personas!</p>
    </article>
  </div>
  <div class="container">
    <section class="entries">
      <h2>Últimas publicaciones</h2>
      <div class="entries-container">
        <?php
        include_once "php/base_de_datos.php";
        $result = $base_de_datos->prepare("SELECT * FROM entradas ORDER BY fecha_publicacion DESC, hora_publicacion DESC LIMIT 3");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
          <article class="post">
            <h3 class="entrieTitle"><a href="php/showEntrie.php?id=<?php echo $row['id'];?>"><?php echo $row['titulo']; ?></a></h3>
            <span class="entrieDate"><ion-icon name="calendar"></ion-icon> publicado el <?php echo $row['fecha_publicacion'] . " a las " . substr($row['hora_publicacion'],0,5); ?></span>
            <p><?php echo strip_tags(substr($row['descripcion'],0,200)) ;?>... <a href="php/showEntrie.php?id=<?php echo $row['id'];?>">Leer mas...</a></p>
          </article>
          <?php if ($i == 2) { echo "<div class='dVerMas'><a class='aVerMas' href='php/entries.php' title='Ver mas'>&plus;</a></div>"; break; } ?>
        <?php } ?>
      </div>
    </section>
    <aside class="aside-bar">
      <?php if(!empty($_SESSION['nombre_usuario'])) { ?>
      <div class="aside-user-box">
        <?php
        include_once "php/base_de_datos.php";
        $usuarioLogin = $_SESSION['nombre_usuario'];
        $consulta= "SELECT img_avatar FROM usuarios WHERE nombre_usuario = '$usuarioLogin'";
        $sentencia= $base_de_datos->query($consulta);
        if ($sentencia == TRUE ) {
          $results = $sentencia->fetch();
          echo ("<img src='img/avatars/$results[0]' alt='Avatar'>");
        }
        ?>
        <a href="php/userSettings.php"><ion-icon name="person"></ion-icon>Perfil</a>
        <a href="php/logout.php"><ion-icon name="log-out"></ion-icon>Desconectar</a>
      </div>
      <?php } ?>
      <div class="searchbox">
        <form class="" action="php/entriesSearch.php" method="post">
          <input type="text" name="searchfield" placeholder="Buscar...">
        </form>
      </div>
      <h3>Categorías</h3>
      <nav class="aside-nav">
        <ul>
          <?php
          include_once "php/base_de_datos.php";
          $result = $base_de_datos->prepare("SELECT categoria FROM entradas GROUP BY categoria");
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++){ ?>
            <li><a href="php/entriesFilter.php?categoria=<?php echo $row['categoria'];?>"><?php echo $row['categoria'];?></a></li>
          <?php } ?>
        </ul>
      </nav>
      <nav class="aside-social">
        <h4>Redes sociales</h4>
        <ul>
          <li><a href="http://www.fptxurdinaga.hezkuntza.net/web/Guest" title="FP" target="_blank"><ion-icon name="logo-rss"></ion-icon></a></li>
          <li><a href="https://www.youtube.com/channel/UCDBiikZmW0z9_PM3Bn0rqkg" title="Youtube" target="_blank"><ion-icon name="logo-youtube"></ion-icon></a></li>
          <li><a href="https://github.com/IK2DW3/g2blog.com" title="GitHub" target="_blank"><ion-icon name="logo-github"></ion-icon></a></li>
        </ul>
      </nav>
    </aside>
  </div>
  <!-- Fin del contenedor -->
  <?php
  // incluimos el footer
  include_once "php/layoutFooter.php";
  ?>
</body>
<!-- Fin del body -->
</html>
<!-- Fin del HTML 5 -->
