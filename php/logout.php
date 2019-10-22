<?php
// start session
session_start();

// Destroy user session
unset($_SESSION['nombre_usuario']);

//redirect to login page
header("Location: ../index.php");
?>
