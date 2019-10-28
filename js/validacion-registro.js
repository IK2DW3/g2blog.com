window.onload = function() {
  document.getElementById('pop').style.display = 'none';
}
/*
* Creamos una funcion de prototipado para crear mensajes de alerta
* Añadimos parametros aplicados DOM
*/
var mensaje = function() {
  // Inicio de las funciones tipo
  function info(txt) {
    var popBox = document.getElementById('pop');
    var texto = document.getElementById('text');
    popBox.classList.add('pop-1');
    texto.innerHTML = txt;
    var iconoBox = document.getElementById('icon');
    var icono = document.createElement('ion-icon');
    icono.setAttribute("name", "information-circle-outline");
    iconoBox.appendChild(icono);
    document.getElementById('pop').style.display = 'inherit';
  }

  function valido(txt) {
    var popBox = document.getElementById('pop');
    var texto = document.getElementById('text');
    popBox.classList.add('pop-2');
    texto.innerHTML = txt;
    var iconoBox = document.getElementById('icon');
    var icono = document.createElement('ion-icon');
    icono.setAttribute("name", "checkmark-circle-outline");
    iconoBox.appendChild(icono);
    document.getElementById('pop').style.display = 'inherit';
  }

  function alerta(txt) {
    var popBox = document.getElementById('pop');
    var texto = document.getElementById('text');
    popBox.classList.add('pop-3');
    texto.innerHTML = txt;
    var iconoBox = document.getElementById('icon');
    var icono = document.createElement('ion-icon');
    icono.setAttribute("name", "alert");
    iconoBox.appendChild(icono);
    document.getElementById('pop').style.display = 'inherit';
  }

  function error(txt) {
    var popBox = document.getElementById('pop');
    var texto = document.getElementById('text');
    popBox.classList.add('pop-4');
    texto.innerHTML = txt;
    var iconoBox = document.getElementById('icon');
    var icono = document.createElement('ion-icon');
    icono.setAttribute("name", "close-circle-outline");
    iconoBox.appendChild(icono);
    document.getElementById('pop').style.display = 'inherit';
  }

  return {
    mostrarInfo: function(txt) {
      info(txt);
    },
    mostrarValido: function(txt) {
      valido(txt);
    },
    mostrarAlerta: function(txt) {
      alerta(txt);
    },
    mostrarError: function(txt) {
      error(txt);
    }
  }
}
var msg = mensaje();

/*
* Funcion para validar el registro del usuario
*/
function validacion() {
  nombrePersona = document.getElementById("name").value;
  apellidosPersona  = document.getElementById("surname").value;
  nombreUsuario = document.getElementById("usernameRegister").value;
  passwordUsuario = document.getElementById("passwordRegister").value;
  confirmarPasswordUsuario = document.getElementById("confirmPassword").value;
  email = document.getElementById("email").value;
  opciones = document.getElementsByName("sexo");
  elemento = document.getElementById("terminosCondiciones");

  if (nombrePersona == null || nombrePersona.length == 0 || /^\s+$/.test(nombrePersona)) { // nombrePersona
    msg.mostrarError("Se necesita nombre válido");
    return false;
  }
  else if (apellidosPersona == null || apellidosPersona.length == 0 || /^\s+$/.test(apellidosPersona)) { // apellidosPersona
    msg.mostrarError("Se necesita apellido válido");
    return false;
  }
  else if (nombreUsuario == null || nombreUsuario.length == 0 || /^\s+$/.test(nombreUsuario)) { // nombreUsuario
    msg.mostrarError("Nombre de usuario incorrecto / usuario ya existe");
    return false;
  }
  else if (passwordUsuario == null || passwordUsuario.length == 0 || /^\s+$/.test(passwordUsuario)) { // passwordUsuario
    msg.mostrarError("La contraseña debe tener un minimo de 8 carácteres");
    return false;
  }
  else if (confirmarPasswordUsuario == null || confirmarPasswordUsuario.length == 0 || /^\s+$/.test(confirmarPasswordUsuario)) { // confirmarPasswordUsuario
    msg.mostrarError("La contraseña debe tener un minimo de 8 carácteres");
    return false;
  }
  else if (!(passwordUsuario === confirmarPasswordUsuario)) { // Confirmar que las dos contraseñas son iguales
    msg.mostrarError("Las contraseñas deben coincidir");
    return false;
  }
  else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) { // Validar el email
    msg.mostrarError("Debe insertar una dirección de correo válido");
    return false;
  }
  else if( !elemento.checked ) {
    msg.mostrarError("Debe aceptar los terminos y condiciones");
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
  return true;
}

/*
* Funcion para la validacion de login
*/
function validacionLogin() {
  var x = document.forms["fPrincipal"]["nombreDeUsuario"].value;
  var y = document.forms["fPrincipal"]["confirmPassword"].value;
  if (x == "") {
    msg.mostrarError("Has dejado el campo nombre sin rellenar");
    return false;
  } else if (y == "") {
    msg.mostrarError("Has dejado el campo contraseña sin rellenar");
    return false;
  }
  return true;
}
