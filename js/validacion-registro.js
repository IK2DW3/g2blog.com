function validacion() {
  var nombrePersona = document.getElementById("campo").value;
  var apellidosPersona  = document.getElementById("campo").value;
  var nombreUsuario = document.getElementById("campo").value;
  var passwordUsuario = document.getElementById("campo").value;
  var confirmarPasswordUsuario = document.getElementById("campo").value;
  var email = document.getElementById("email").value;
  var numeroTelefono = document.getElementById("number").value;
  var opciones = document.getElementsByName("sexo");
  var mensaje = "[ERROR] El campo debe tener un valor de...";

  if (valor == null || valor.length == 0 || /^\s+$/.test(nombrePersona)) { // nombrePersona
    // Si no se cumple la condicion...
    console.log('[ERROR] El campo debe tener un valor de...');
    return false;
  }
  else if (valor == null || valor.length == 0 || /^\s+$/.test(apellidosPersona)) { // apellidosPersona
    // Si no se cumple la condicion...
    console.log('[ERROR] El campo debe tener un valor de...');
    return false;
  }
  else if (valor == null || valor.length == 0 || /^\s+$/.test(nombreUsuario)) { // nombreUsuario
    // Si no se cumple la condicion...
    console.log('[ERROR] El campo debe tener un valor de...');
    return false;
  }
  else if (valor == null || valor.length == 0 || /^\s+$/.test(passwordUsuario)) { // passwordUsuario
    // Si no se cumple la condicion...
    console.log('[ERROR] El campo debe tener un valor de...');
    return false;
  }
  else if (valor == null || valor.length == 0 || /^\s+$/.test(confirmarPasswordUsuario)) { // confirmarPasswordUsuario
    // Si no se cumple la condicion...
    console.log('[ERROR] El campo debe tener un valor de...');
    return false;
  }
  else if (!(passwordUsuario === confirmarPasswordUsuario)) { // Confirmar que las dos contraseñas son iguales
    // Si no se cumple la condicion...
    console.log('[ERROR] Las contraseñas son diferentes...');
    alert(mensaje);
    return false;
  }
  else if ( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email)) ) { // Validar el email
    // Si no se cumple la condicion...
    console.log('[ERROR] El campo debe tener un valor de...');
    return false;
  }
  else if ( !(/^\d{9}$/.test(numeroTelefono)) ) { // Validar el numero de movil
    // Si no se cumple la condicion...
    console.log('[ERROR] El campo debe tener un valor de...');
    return false;
  }
  // Confirmacion del sexo del usuario
  var seleccionado = false;
  for(var i = 0 ; i < opciones.length; i++) {
    if(opciones[i].checked) {
      seleccionado = true;
      break;
    }
  }
  if(!seleccionado) {
    return false;
  }

  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;
}
