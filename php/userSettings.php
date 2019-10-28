<?php
session_start();
$usuarioLogin = $_SESSION['nombre_usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../fav/favicon.ico" type="image/x-icon"> <!-- Favicon http://www.mclibre.org/consultar/htmlcss/html/html-unicode-dibujos.html -->
  <link rel="stylesheet" href="../css/style.css" class="css"> <!-- Website Stylesheet -->
  <script src="../js/profileSettings.js"></script>
  <title><?php echo "G2BLOG - Perfil ".$usuarioLogin; ?></title>
</head>
<body>
  <header class="header" id="header">
    <a class="a-logo" href="index.php"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
    <h1><a class="a-title" href="../index.php">G2BLOG</a></h1>
    <nav class="header-nav" id="header-nav">
      <ul class="hnavegador" id="hnavegador">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="php/entradas.php">Entradas</a></li>
        <li><a class="a-buttom" href="logout.php">Log out</a></li>
      </ul>
    </nav>
  </header>

  <div class="panelUsuario">
    <aside class="user-aside">
      <div class="user-icon">
        <?php
        include_once "base_de_datos.php";
        $consulta= "SELECT nombre, apellidos, tipo_usuario, email, img_avatar FROM usuarios WHERE nombre_usuario = '$usuarioLogin'";
        $sentencia= $base_de_datos->query($consulta);
        if ($sentencia == TRUE ) {
          $results = $sentencia->fetch();
          if (!$results[4] == '') {
            echo ("<img src='../img/$results[4]' alt='Avatar'>");
          } else {
            echo ("<img src='../img/contact.png' alt='Avatar'>");
          }
        } else {
          echo ("<img src='../img/contact.png' alt='Avatar'>");
        }
        ?>
        <h2><?php if ($usuarioLogin == "") {echo ("Undefined");} else {echo ("Hey, ".$usuarioLogin);} ?></h2>
      </div>
      <nav class="user-nav">
        <ul>
          <li class="op adm-li" id="op1"><a href="#">&#128100; Perfil / Cuenta</a></li>
          <li class="op adm-li" id="op2"><a href="#">&#128209; Mis publicaciones</a></li>
          <?php if ($results[2] == "Administrador") { ?>
          <li class="op adm-li" id="op3"><a href="#">&#128101; Gestionar Usuarios</a></li>
          <li class="op adm-li" id="op4"><a href="#">&#128218; Gestionar Entradas</a></li>
          <?php } ?>
        </ul>
      </nav>
    </aside>
    <section class="user-account" id="user-account">
      <form class="user-data-form" action="updateUsername.php" method="post">
        <legend>Mis datos</legend>
        <label for="usuarioCambiar">Nombre de usuario</label>
        <input type="text" name="usuarioCambiar" value="<?php echo ($_SESSION['nombre_usuario']); ?>" autocomplete="off">
        <label for="nombreCambiar">Email</label>
        <input type="email" name="emailNuevo" value="<?php echo ($results[3]); ?>" readonly>
        <label for="nombreCambiar">Nombre</label>
        <input type="text" name="nombreCambiar" value="<?php echo ($results[0]); ?>" readonly>
        <label for="apellidosCambiar">Apellidos</label>
        <input type="text" name="apellidosCambiar" value="<?php echo ($results[1]); ?>" readonly>
        <label for="passwordVieja">Contraseña actual</label>
        <p class="subText">Ingresa tu contraseña actual para verificar los cambios</p>
        <input type="password" name="passwordVieja" value="">
        <input type="submit" name="submitName" value="Actualizar">
      </form>

      <form class="user-avar-form" action="uploadAvatar.php" method="post" enctype="multipart/form-data">
        <legend>Cambiar avatar</legend>
        <label for="cambiarAvatar">Subir imagen avatar</label>
        <input type="file" name="cambiarAvatar" id="cambiarAvatar" accept=".jpg, .jpeg, .png">
        <div class="preview" id="preview">
          <p>No se ha seleccionado ningun archivo</p>
        </div>
        <input type="submit" name="submitAvatar" value="Actualizar">
      </form>

      <form class="user-secu-form" action="updatePassword.php" method="post">
        <legend>Cambiar contraseña</legend>
        <label for="passwordVieja">Contraseña actual</label>
        <input type="password" name="passwordVieja" value="">
        <label for="passwordNueva">Contraseña nueva</label>
        <input type="password" name="passwordNueva" value="">
        <label for="confirmarPasswordNueva">Confirmar contraseña</label>
        <input type="password" name="confirmarPasswordNueva" value="">
        <input type="submit" name="submitPassword" value="Actualizar">
      </form>
    </section>

    <section class="adm user-entries" id="user-entries">
      <form class="user-entries-form" action="createEntrie.php" method="post">
        <legend>Crear Entrada</legend>
        <label class="label-info" for="entrieTitle">Título de la entrada</label>
        <input class="input-field" id="entrieTitle" type="text" name="entrieTitle" value="" placeholder="Título de entrada..." autocomplete="off">
        <label class="label-info" for="entrieContent">Texto</label>
        <textarea class="input-textarea" id="input-textarea" name="entrieContent" placeholder="Texto de entrada..."></textarea>
        <p class="subText">Texto restante:</p> <p class="subText" id="contador">250</p>
        <select class="entrie-categori" name="entrie-categori">
          <option value="none">Seleccionar categoria</option>
          <option value="Informatica">Informática</option>
          <option value="Off-Topic">Off-Topic</option>
        </select>
        <input class="input-submit" type="submit" name="submitEntrie" value="Publicar">
      </form>
      <h3 id="Entradas">Mis entradas</h3>
      <div class="user-entries-table">
        <input type="text" class="user-searchfiled" id="user-searchfiled-0" placeholder="Buscar título..." title="Type in a name">
        <?php
    			include_once "base_de_datos.php";
    			$sentencia = $base_de_datos->query("SELECT id, titulo, descripcion, fecha_publicacion, categoria, num_comentarios  FROM entradas WHERE name_usuario = '$usuarioLogin' ORDER BY fecha_publicacion DESC ;");
    			$entrada = $sentencia->fetchAll(PDO::FETCH_OBJ);
    		?>
        <table class="info-tabla" id="myTable">
          <thead>
            <tr>
              <th>Título</th>
              <th style="display:none;">Contenido</th>
              <th>Categoria</th>
              <th>Nº Comentarios</th>
              <th>Fecha Publicada</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($entrada as $entradas){ ?>
            <tr>
              <td><?php echo $entradas->titulo ?></td>
              <td style="display:none;"><?php echo $entradas->descripcion ?></td>
              <td><?php echo $entradas->categoria ?></td>
              <td><?php echo $entradas->num_comentarios ?></td>
              <td><?php echo $entradas->fecha_publicacion ?></td>
              <td><a href="<?php echo "removeEntrie.php?id=" . $entradas->id?>">Eliminar</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <form class="user-entries-form" action="" method="post">
        <legend>Editar Entrada</legend>
        <p class="subText">Para editar una entrada selecciona el titulo desde la tabla.</p>
        <label class="label-info" for="entrieTitle">Título de la entrada</label>
        <input class="input-field" id="input-field-edit" type="text" name="entrieTitle" placeholder="Título de entrada..." autocomplete="off">
        <label class="label-info" for="entrieContent">Texto</label>
        <textarea class="input-textarea" id="input-textarea-edit" name="entrieContent" rows="8" cols="80" placeholder="Texto de entrada..."></textarea>
        <select class="entrie-categori" id="entrie-categori-edit" name="entrie-categori">
          <option value="none">Seleccionar categoria</option>
          <option value="Informatica">Informática</option>
          <option value="Off-Topic">Off-Topic</option>
        </select>
        <input class="input-submit" type="submit" name="submitEntrie" value="Actualizar">
        <input class="input-reset" type="reset" name="resetFields" value="Limpiar">
      </form>
    </section>
    <?php if ($results[2] == "Administrador") { ?>
    <section class="adm adm-users" id="adm-users">
      <h3 id="Entradas">Lista usuarios</h3>
      <div class="adm-users-table">
        <input type="text" class="user-searchfiled" id="user-searchfiled-1" placeholder="Buscar título..." title="Type in a name">
        <?php
        include_once "base_de_datos.php";
        $sentencia = $base_de_datos->query("SELECT * FROM usuarios;");
        $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        ?>
        <table class="info-tabla" id="myTable">
            <thead>
              <tr>
                <th>Nombre usuario</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha Nacimiento</th>
                <th>Género</th>
                <th>Nº Entradas</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($usuario as $usuarios){ ?>
              <tr>
                <td><?php echo $usuarios->nombre_usuario ?></td>
                <td><?php echo $usuarios->email ?></td>
                <td><?php echo $usuarios->nombre ?></td>
                <td><?php echo $usuarios->apellidos ?></td>
                <td><?php echo $usuarios->fecha_nacimiento ?></td>
                <td><?php echo $usuarios->sexo ?></td>
                <td><?php echo $usuarios->entradas_publicadas ?></td>
                <!--<td><a href="<?php echo "eliminar.php?id=" . $persona->id?>">Eliminar</a></td>-->
              </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
    </section>
    <?php } ?>

  </div>

  <footer class="footer">
    <p>Con la tecnología de nuestra imaginación</p>
  </footer>
</body>
</html>
