<?php
define ("salto", "<br />\n");
session_start();
$_SESSION['nombreDeUsuario'] = $_POST['nombreDeUsuario'];
$_SESSION['colorElegido'] = $_POST['colorElegido'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>paginaCeroDeSesiones</title>
  <script type="text/javascript">
    function mandar() {
      document.f0.submit();
    }
  </script>
</head>
<body onload="javascript:mandar();">
  <form name="f0" id="f0" action="paginaUno.php" method="post">
    <input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
  </form>
</body>
</html>

<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    // Redirect them to the login page
    header("Location: index.php");
} else {
    // Redirect them to the login page
    header("Location: login.php");
}
?>
