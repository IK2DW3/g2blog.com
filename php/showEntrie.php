<!DOCTYPE html>
<?php
session_start();
include_once "base_de_datos.php";
$id=$_GET['id'];
$result = $base_de_datos->prepare("SELECT * FROM entradas WHERE id = :post_id");
$result->bindParam(':post_id', $id);
$result->execute();

for($i=0; $row = $result->fetch(); $i++){
?>
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
  <script src="../js/interaccionesUsuario.js"></script>
  <script src="../js/entries.js"></script>
  <title>G2BLOG - <?php echo $row['titulo']; ?></title> <!-- Website title -->
</head>
<body>
  <header class="header" id="header">
    <a class="a-logo" href="../index.php"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
    <h1><a class="a-title" href="../index.php">G2BLOG</a></h1>
    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a class="highlight" href="../index.php">Inicio</a></li>
        <li><a href="entradas.php">Entradas</a></li>
        <?php if(empty($_SESSION['nombre_usuario'])) { ?>
        <li><a class="a-buttom" href="login.php">Log in</a></li>
        <li><a class="a-buttom" href="register.php">Registrarse</a></li>
        <?php } else { ?>
        <li class="a buttonDropdown" id="dropdownMenuButton"><?php echo ("Hey, ".$_SESSION['nombre_usuario']." &#9660"); ?>
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
      <article class="showEntrie">
        <h2><?php echo $row['titulo']; ?></h2>
        <span class="entrieDate"><ion-icon name="calendar"></ion-icon> publicado el <?php echo $row['fecha_publicacion']; ?></span>
        <p><?php echo $row['descripcion'];?></p>
      </article>
      <?php if(!empty($_SESSION['nombre_usuario'])) { ?>
      <form class="entrie-comment" action="addComment.php" method="post">
        <legend>Deja tu comentario...</legend>
        <input type="hidden" name="entrie-id-comment" value="<?php echo $row['id']; ?>" readonly>
        <textarea name="textarea-comment" id="textarea-comment" placeholder="Deja tu comentario..."></textarea>
        <input class="comment-submit" type="submit" name="comment-submit" value="Comentar">
      </form>
      <?php } ?>
    </section>
    <aside class="aside-bar">
      <?php if(!empty($_SESSION['nombre_usuario'])) { ?>
      <div class="aside-user-box">
        <?php
        include_once "base_de_datos.php";
        $usuarioLogin = $_SESSION['nombre_usuario'];
        $consulta= "SELECT img_avatar FROM usuarios WHERE nombre_usuario = '$usuarioLogin'";
        $sentencia= $base_de_datos->query($consulta);
        if ($sentencia == TRUE ) {
          $results = $sentencia->fetch();
          if (!$results[0] == '') {
            echo ("<img src='../img/$results[0]' alt='Avatar'>");
          } else {
            echo ("<img src='../img/contact.png' alt='Avatar'>");
          }
        } else {
          echo ("<img src='../img/contact.png' alt='Avatar'>");
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
          <li><a href="#">Informática</a></li>
          <li><a href="#">Off-Topics</a></li>
        </ul>
      </nav>
    </aside>
  </div>
  <?php } ?>
  <footer class="footer">
    <p>Con la tecnología de nuestra imaginación</p>
  </footer>
</body>
</html>
