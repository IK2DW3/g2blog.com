<?php
session_start();
include_once "base_de_datos.php";

$categoria = $_GET['categoria'];
$result = $base_de_datos->prepare("SELECT * FROM entradas WHERE categoria = :post_category ORDER BY hora_publicacion");
$result->bindParam(':post_category', $categoria);
$result->execute();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon http://www.mclibre.org/consultar/htmlcss/html/html-unicode-dibujos.html -->
  <link rel="stylesheet" href="../css/style.css" class="css"> <!-- Website Stylesheet -->
  <!-- Icon pack link https://ionicons.com/ -->
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
  <script src="../js/showEntrie.js"></script>
  <title>G2BLOG - <?php echo "$categoria"?> </title>
</head>
<body>
  <header class="header" id="header">
    <a class="a-logo" href="../index.php"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
    <h1><a class="a-title" href="../index.php">G2BLOG</a></h1>
    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a href="../index.php">Inicio</a></li>
        <li><a class="highlight" href="entries.php">Entradas</a></li>
        <?php if(empty($_SESSION['nombre_usuario'])) { ?>
        <li><a class="a-buttom" href="login.php">Log in</a></li>
        <li><a class="a-buttom" href="register.php">Registrarse</a></li>
        <?php } else { ?>
        <li class="a buttonDropdown" id="dropdownMenuButton"><?php echo ("Hey! &#128225 &#9660"); ?>
          <ul class="dropdown" id="dropdown">
            <li><a href="userSettings.php">Mi perfil</a></li>
            <li><a href="#">Modo noche</a></li>
            <li><a href="logout.php">Desconectar</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </header>

  <div class="container">
    <section class="entries">
      <h2><?php echo "$categoria";?></h2>
      <div class="entries-container">
        <?php
        for($i=0; $row = $result->fetch(); $i++){ ?>
          <article class="post">
            <h3 class="entrieTitle"><a href="showEntrie.php?id=<?php echo $row['id'];?>"><?php echo $row['titulo']; ?></a></h3>
            <span class="entrieDate"><ion-icon name="calendar"></ion-icon> publicado el <?php echo $row['fecha_publicacion']; ?></span>
            <p><?php echo strip_tags(substr($row['descripcion'],0,200)) ;?>... <a href="showEntrie.php?id=<?php echo $row['id'];?>">Leer mas...</a></p>
          </article>
          <?php if ($i == 4) { echo "<div class='dVerMas'><a class='aVerMas' href='' title='Ver mas'>&plus;</a></div>"; break; } ?>
        <?php } ?>
      </div>
    </section>
    <aside class="aside-bar">
      <?php if(!empty($_SESSION['nombre_usuario'])) { ?>
      <div class="aside-user-box">
        <?php
        $usuarioLogin = $_SESSION['nombre_usuario'];
        $consulta= "SELECT img_avatar FROM usuarios WHERE nombre_usuario = '$usuarioLogin'";
        $sentencia= $base_de_datos->query($consulta);
        if ($sentencia == TRUE ) {
          $results = $sentencia->fetch();
          echo ("<img src='../img/avatars/$results[0]' alt='Avatar'>");
        }
        ?>
        <a href="userSettings.php"><ion-icon name="person"></ion-icon>Perfil</a>
        <a href="logout.php"><ion-icon name="log-out"></ion-icon>Desconectar</a>
      </div>
      <?php } ?>
      <div class="searchbox">
        <input type="text" name="searchfield" placeholder="Buscar...">
      </div>
      <h3>Categorías</h3>
      <nav class="aside-nav">
        <ul>
          <?php
          $result = $base_de_datos->prepare("SELECT categoria FROM entradas GROUP BY categoria");
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++){ ?>
            <li><a href="entriesFilter.php?categoria=<?php echo $row['categoria'];?>"><?php echo $row['categoria'];?></a></li>
          <?php } ?>
        </ul>
      </nav>
    </aside>
  </div>

  <?php
  // footer HTML and JavaScript codes
  include_once "layoutFooter.php";
  ?>

</body>
</html>
