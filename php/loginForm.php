<?php
session_start();
$nombreDeUsuario = "";
$confirmPassword = "";
$_SESSION['nombreDeUsuario'] = $nombreDeUsuario;
$_SESSION['confirmPassword'] = $confirmPassword;
/*session_register($nombreDeUsuario, $colorElegido);*/
?>
<?php
// Always start this first
session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['nombreDeUsuario'] ) && isset( $_POST['confirmPassword'] ) ) {
      // Getting submitted user data from database
      $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
      $stmt = $con->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
      $stmt->bind_param('s', $_POST['nombreDeUsuario']);
      $stmt->execute();
      $result = $stmt->get_result();
    	$user = $result->fetch_object();

    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['confirmPassword'], $user->password ) ) {
    		$_SESSION['user_id'] = $user->ID;
    	}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet"> <!-- Icon pack link https://ionicons.com/ -->
  <link rel="stylesheet" href="../css/style.css" class="css"> <!-- Website Stylesheet -->
  <title>G2BLOG - Login</title> <!-- Website title -->
</head>
<body>
  <div class="grid-container">
    <header class="box1" id="box1">
      <a href="../index.html"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
      <h1>G2BLOG</h1>
    </header>
    <form name="fPrincipal" class="fPrincipal" id="fPrincipal" action="confirmacionLogin.php" method="post">
      <img src="../img/iconlogo.png" alt="G2BLOG">
      <h2>Login</h2>
      <label for="nombreDeUsuario">Usuario o Email</label>
      <input type="text" name="nombreDeUsuario" id="nombreDeUsuario" value="" autocomplete="off">
      <label for="confirmPassword">Contraseña</label>
      <input type="password" name="confirmPassword" value="">
      <input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
      <input type="submit" name="mandar" value="ACCEDER">
      <a class="link" href="#">¿Contraseña olvidada?</a>
    </form>
    <footer class="box4" id="box4">
      <h4>Con la tecnología de nuestra imaginación</h4>
    </footer>
  </div>
</body>
</html>
