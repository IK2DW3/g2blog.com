function validateForm() {
  var x = document.forms["formulario-registro"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
function validacion() {
  nombrePersona = document.getElementById("name").value;
  apellidosPersona  = document.getElementById("surname").value;
  nombreUsuario = document.getElementById("usernameregister").value;
  passwordUsuario = document.getElementById("passwordregister").value;
  confirmarPasswordUsuario = document.getElementById("confirmpassword").value;
  email = document.getElementById("email").value;
  opciones = document.getElementsByName("sexo");
  elemento = document.getElementById("terminosCondiciones");

  if (nombrePersona == null || nombrePersona.length == 0 || /^\s+$/.test(nombrePersona)) { // nombrePersona
    // Si no se cumple la condicion...
    alert("Se necesita un nombre de persona válido o ha excedido el número de carácteres");
    return false;
  }
  else if (apellidosPersona == null || apellidosPersona.length == 0 || /^\s+$/.test(apellidosPersona)) { // apellidosPersona
    // Si no se cumple la condicion...
    alert("Se necesita un apellido de persona válido o ha excedido el número de carácteres");
    return false;
  }
  else if (nombreUsuario == null || nombreUsuario.length == 0 || /^\s+$/.test(nombreUsuario)) { // nombreUsuario
    // Si no se cumple la condicion...
    alert("Nombre de usuario incorrecto / usuario ya existe");
    return false;
  }
  else if (passwordUsuario == null || passwordUsuario.length == 0 || /^\s+$/.test(passwordUsuario)) { // passwordUsuario
    // Si no se cumple la condicion...
    alert("La contraseña debe tener un minimo de 8 carácteres");
    return false;
  }
  else if (confirmarPasswordUsuario == null || confirmarPasswordUsuario.length == 0 || /^\s+$/.test(confirmarPasswordUsuario)) { // confirmarPasswordUsuario
    // Si no se cumple la condicion...
    alert("La contraseña debe tener un minimo de 8 carácteres");
    return false;
  }
  else if (!(passwordUsuario === confirmarPasswordUsuario)) { // Confirmar que las dos contraseñas son iguales
    // Si no se cumple la condicion...
    alert("Las contraseñas deben coincidir");
    return false;
  }
  else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) { // Validar el email
    // Si no se cumple la condicion...
    alert("Debe insertar una dirección de correo válido");
    return false;
  }
  else if( !elemento.checked ) {
    alert("Debe aceptar los terminos y condiciones");
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
