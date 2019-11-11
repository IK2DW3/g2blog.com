<?php
session_start();
// incluimos la conexion de la bd
include_once "base_de_datos.php";
$id=$_GET['id'];
$result = $base_de_datos->prepare("SELECT * FROM entradas WHERE id = :post_id");
$result->bindParam(':post_id', $id);
$result->execute(); // recogemos los datos
// recorremos la pagina con un array
for($i=0; $row = $result->fetch(); $i++){ ?> <!-- Inicio del FOR -->
<!DOCTYPE html> <!-- Inicio del HTML 5 -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link rel="stylesheet" href="../css/style.css" class="css"> <!-- Website Stylesheet -->
  <!-- Icon pack link https://ionicons.com/ -->
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
  <script src="../js/app.js"></script>
  <title>G2BLOG - <?php echo $row['titulo']; ?></title> <!-- Website title -->
</head>
<!-- Inicio del body -->
<body>
  <!-- Inicio de la cabecera -->
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
            <li><a href="#" id="modo">Modo noche</a></li>
            <li><a href="logout.php">Desconectar</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <!-- Fin de la cabecera -->
  <!-- Inicio del contenedor -->
  <div class="container">
    <section class="entries">
      <article class="showEntrie">
        <h2><?php echo $row['titulo']; ?></h2>
        <?php if (!($row['img_entrada'] == "")): ?>
          <div class="entrie-img">
            <img src="../img/entries/<?php echo $row['img_entrada'] ?>" alt="Imagen representativa de la entrada">
          </div>
        <?php endif; ?>
        <p id="parrafo"><?php echo nl2br($row['descripcion']);?></p> <!-- Funcion nl2br hace que si lee \n inserta un salto de linea en el texto -->
        <span class="entrieDate"><ion-icon name="calendar"></ion-icon> publicado el <?php echo $row['fecha_publicacion']; ?> por <?php echo $row['name_usuario']; ?></span>
        <br><br>
        <span class="entrieDate">Categoria: <?php echo $row['categoria']; ?></span>
      </article>
      <?php if(!empty($_SESSION['nombre_usuario'])) { ?>
      <form class="entrie-comment" action="addComment.php" method="post">
        <legend>Deja tu comentario...</legend>
        <input type="hidden" name="entrie-id-comment" value="<?php echo $row['id']; ?>" readonly>
        <textarea name="textarea-comment" id="textarea-comment" placeholder="Deja tu comentario..."></textarea>
        <p id="contador">200</p>
        <input class="comment-submit" type="submit" name="comment-submit" value="Comentar">
      </form>
      <?php }
      $result = $base_de_datos->prepare("SELECT `comentarios`.*, `usuarios`.img_avatar FROM comentarios  LEFT JOIN `usuarios` ON `comentarios`.`name_usuario` = `usuarios`.`nombre_usuario` WHERE id_entrada = :post_id ORDER BY fecha_comentario DESC");
      $result->bindParam(':post_id', $id);
      $result->execute();
      for($i=0; $row = $result->fetch(); $i++){
      ?>
      <div class="comment">
        <aside class="comment-izda">
          <img src="../img/avatars/<?php echo $row['img_avatar']; ?>" alt="Avatar">
        </aside>
        <article class="comment-dcha">
          <h3><?php echo $row['name_usuario']; ?><span> publicado el <?php echo $row['fecha_comentario']; ?></span></h3>
          <p><?php echo nl2br($row['descripcion']); ?></p>
          <?php
          if(!empty($_SESSION['nombre_usuario'])) {
            $usuarioLogin = $_SESSION['nombre_usuario'];
            $consulta= "SELECT tipo_usuario FROM usuarios WHERE nombre_usuario = '$usuarioLogin'";
            $sentencia= $base_de_datos->query($consulta);
            $results = $sentencia->fetch();
            if ($results[0] == "Administrador") { ?>
            <p class="eli-comment"><a href="<?php echo "removeComment.php?id=" . $row['id']?>">Eliminar comentario</a></p>
          <?php } } ?>
        </article>
      </div>
      <?php } ?>
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
        <form action="entriesSearch.php" method="post">
          <input type="text" name="searchfield" placeholder="Buscar...">
        </form>
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
      <nav class="aside-social">
        <h4>Redes sociales</h4>
        <ul>
          <li><a href="http://www.fptxurdinaga.hezkuntza.net/web/Guest" title="FP"><ion-icon name="logo-rss"></ion-icon></a></li>
          <li><a href="https://www.youtube.com/channel/UCDBiikZmW0z9_PM3Bn0rqkg" title="Youtube"><ion-icon name="logo-youtube"></ion-icon></a></li>
          <li><a href="https://github.com/IK2DW3/g2blog.com" title="GitHub"><ion-icon name="logo-github"></ion-icon></a></li>
        </ul>
      </nav>
    </aside>
  </div>
  <!-- Fin del contenedor -->
<?php } ?> <!-- Cerrar el FOR -->
  <?php
  // incluir el footer
  include_once "layoutFooter.php";
  ?>
</body>
<!-- Fin del body -->
</html>
<!-- Fin del HTML 5 -->
