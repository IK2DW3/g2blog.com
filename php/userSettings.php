<?php
session_start();
if (isset($_POST['nombreDeUsuario'])) {
  $_SESSION['nombreDeUsuario'] == $_POST['nombreDeUsuario'];
} else {
  $_SESSION['nombreDeUsuario'] == "Undefined";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link rel="stylesheet" href="../css/index.css" class="css"> <!-- Website Stylesheet -->
  <title><?php echo "G2BLOG - Perfil ".$_SESSION['nombreDeUsuario']; ?></title>
</head>
<body>
  <header class="header" id="header">
    <a class="a-logo" href="index.php"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
    <h1><a class="a-title" href="index.php">G2BLOG</a></h1>
    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="php/entradas.php">Entradas</a></li>
        <li><a class="a-buttom" href="logout.php">Log out</a></li>
      </ul>
    </nav>
  </header>

  <div class="panelUsuario">
    <nav class="nav-user">
      <?php
      include_once "base_de_datos.php";
      $user = $_SESSION['nombreDeUsuario'];
      $sql= "SELECT img_avatar FROM usuarios WHERE nombre_usuario = '$user'";
      $stmt = $base_de_datos->query($sql);
      $row = $stmt->fetchObject();
      if ($row == true) {
        echo ("<img src='.$row->img_avatar'>");
      } else {
        echo ("<img src='../img/contact.png'>");
      }
      ?>
      <h3><?php if ($user == "") {echo ("Undefined");} else {echo ($user);} ?></h3>
      <ul>
        <li><a href="#">Perfil</a></li>
        <li><a href="#">Cuenta</a></li>
      </ul>
    </nav>
    <section class="user-settings" id="user-settings">

    </section>
    <section class="user-account" id="user-account">

    </section>
  </div>

  <footer class="footer">
    <p>Con la tecnología de nuestra imaginación</p>
  </footer>
</body>
</html>
