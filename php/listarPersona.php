<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM usuarios;");
$usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Listar usuarios</title>
    <link rel="stylesheet" href="../css/styleListar.css" class="css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
    <div class="grid-container">    
        <header class="box1" id="box1">
        <a href="index.html"><img src="../img/iconlogo.png" alt="G2BLOG"></a>
        <h1>G2BLOG</h1>
        </header>

        <section class="box2" id="box2">
            <div class="buscador">
                <input type="text">
                <i class="material-icons">find_in_page</i>
            </div>
            <div class="responsive-table">
                <table id="customers">
                    <thead>
                        <tr>
                            <th>Nombre_Usuario</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha_Nacimiento</th>
                            <th>Género</th>
                            <th>Entradas_Publicadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--
                            Atención aquí, sólo esto cambiará
                            Pd: no ignores las llaves de inicio y cierre {}
                        -->
                        <?php foreach($usuario as $usuarios){ ?>
                        <tr>
                            <td><?php echo $usuarios->nombre_usuario ?></td>
                            <td><?php echo $usuarios->password ?></td>
                            <td><?php echo $usuarios->email ?></td>
                            <td><?php echo $usuarios->nombre ?></td>
                            <td><?php echo $usuarios->apellidos ?></td>
                            <td><?php echo $usuarios->fecha_nacimiento ?></td>
                            <td><?php echo $usuarios->sexo ?></td>
                            <td><?php echo $usuarios->entradas_publicadas ?></td>

                            <!--<td><a href="<?php echo "editar.php?id=" . $persona->id?>">Editar</a></td>
                            <td><a href="<?php echo "eliminar.php?id=" . $persona->id?>">Eliminar</a></td>-->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="box3" id="box3">
        </section>

        <footer class="box4" id="box4">
            <h4>Con la tecnología de nuestra imaginación</h4>
        </footer>
    </div>
</body>
</html>
