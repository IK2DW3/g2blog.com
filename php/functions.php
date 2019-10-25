<?php
/*
* Comienzo de archivo de funciones
*/

// Variables para la funcion de encrypt contraseñas y decrypt
$key = md5('australia');
$papaya = md5('australia');

function encrypt($string, $key) {
  $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
  return $string;
}

function decrypt($string, $key) {
  $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
  return $string;
}

function hashword($string, $papaya) {
  $string = crypt($string, '$1$' . $papaya . '$');
  return $string;
}
?>
