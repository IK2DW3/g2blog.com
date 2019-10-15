<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css" class="css">
  <title>G2BLOG - Registrarse</title>
</head>
<body>
  <div class="grid-container">
    <header class="box1" id="box1">
      <img src="" alt="">
      <h1>G2BLOG</h1>
    </header>
    <section class="box-registro" id="box-registro">
      <form class="formulario-registro" action="" method="post">
        <fieldset>
          <legend>Formulario De Registro</legend>
          <input type="text" name="name" id="name" placeholder="Nombre..." value="" required>
          <input type="text" name="surname" id="" placeholder="Apellido(s)..." value="" required>
          <input type="text" name="username" id="" placeholder="Usuario..." value="" required>
          <input type="password" name="password" id="" placeholder="Contraseña..." value="" required>
          <input type="password" name="confirmpassword" id="" placeholder="Confirmar contraseña..." value="" required>
          <input type="radio" name="sex[]" value="W">Mujer<input type="radio" name="sex[]" value="M">Hombre
          <input type="text" name="number" id="number" placeholder="Número teléfono (Opcional)..." value="">
          <input type="submit" name="submit" value="Registrarse">
        </fieldset>
      </form>
    </section>
    <section class="box-logueo" id="box-logueo">
      <form class="formulario-login" action="" method="post">
        <img src="../img/logo.png" alt="G2BLOG">
        <h3>Login</h3>
        <input type="text" name="username" id="" placeholder="Usuario..." value="" required>
        <input type="password" name="password" id="" placeholder="Contraseña..." value="" required>
        <input type="submit" name="submit" value="Acceder">
        <a class="link" href="#">Forgot password?</a>
      </form>
    </section>
    <footer class="box4" id="box4">
      <h4>Con la tecnología de nuestra imaginación</h4>
    </footer>
  </div>
</body>
</html>
