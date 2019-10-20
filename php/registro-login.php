<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon -->
  <link rel="stylesheet" href="../css/style.css" class="css">
  <title>G2BLOG - Registrarse</title>
  <!-- Validacion registro-->
  <script src="../js/validacion-registro.js"></script>
</head>
<body>
  <div class="grid-container">
    <header class="box1" id="box1">
      <a href="../index.html"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
      <h1>G2BLOG</h1>
    </header>
    <section class="box-registro" id="box-registro">
      <form class="formulario-registro" name="formulario-registro" action="nuevaPersona.php" onsubmit="return validacion()" method="post">
        <fieldset>
          <legend>Formulario De Registro</legend>
          <input type="text" name="name" id="name" placeholder="Nombre..." value="">
          <input type="text" name="surname" id="surname" placeholder="Apellido(s)..." value="">
          <input type="text" name="usernameregister" id="usernameregister" placeholder="Usuario..." value="">
          <input type="password" name="passwordregister" id="passwordregister" placeholder="Contraseña..." value="">
          <br>
          <input type="email" name="email" id="email" placeholder="Email..." value="">
          <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirmar contraseña..." value="">
          <br>
          <input type="date" name="date" value="1960-01-01" min="1960-01-01" max="2003-12-31" required>
          <input type="radio" name="sexo" value="W" id="radio-one" class="form-radio" ><label for="radio-one">Mujer</label>
          <input type="radio" name="sexo" value="M" id="radio-two" class="form-radio" ><label for="radio-one">Hombre</label>
          <br>
          <input type="text" name="number" id="number" placeholder="Número teléfono..." value="">
          <input type="submit" name="submit" value="Registrarse">
        </fieldset>
      </form>
    </section>
    <section class="box-logueo" id="box-logueo">
      <form class="formulario-login" action="" method="post">
        <img src="../img/logo.png" alt="G2BLOG">
        <h3>Login</h3>
        <input type="text" name="usernamelogin" id="usernamelogin" placeholder="Usuario..." value="" required><br>
        <input type="password" name="passwordlogin" id="passwordlogin" placeholder="Contraseña..." value="" required>
        <input type="submit" name="submit" value="Acceder">
        <a class="link" href="#">¿Contraseña olvidada?</a>
      </form>
    </section>
    <footer class="box4" id="box4">
      <h4>Con la tecnología de nuestra imaginación</h4>
    </footer>
  </div>
</body>
</html>
