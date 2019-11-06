window.onload = function() {

  /* Elementos principales del header */
  // Navegador para el usuario logueado
  if (!(document.getElementById("dropdownMenuButton").style.display == "none")) {
    document.getElementById("dropdownMenuButton").addEventListener("click", dropdown);
  }
  /* FIN - Elementos principales del header */

  /* Contadores en los textareas */
  // Creacion y validación de comentarios
  document.getElementById('textarea-comment').addEventListener("keyup",countComentarios);

  // Creacion y validación de entradas
  document.getElementById('input-textarea').addEventListener("keyup",countEntradas);
  /* FIN - Contadores en los textareas */

  // Esconder el popUp

  for (var i = 0; i < document.getElementsByClassName('apop').length; i++) {
    document.getElementsByClassName('apop')[i].style.display = "none";
  }

  /* Guargar el login del usuario */
  if(localStorage.getItem("usuario") && localStorage.getItem("contraseña")){
      document.getElementById("nombreDeUsuario").value = localStorage.getItem("usuario")
      document.getElementById("confirmPassword").value = localStorage.getItem("contraseña")
  }

  document.getElementById('entrar').addEventListener('click', funcion);
  /* FIN - Guargar el login del usuario */

  /* Panel de administracion */
  // Recorrer elemento input para la busqueda de entradas del usuario
  document.getElementById("user-searchfiled-0").addEventListener("keyup", buscarTablaEntradas);

  // Fomulario para el cambio de imagen del usuario y subida de imagenes
  /* Asignar un tamaño máximo a las imagenes de las entradas */
  var uploadField1 = document.getElementById("entrieImg");
  uploadField1.onchange = function() {
      if(this.files[0].size > 904800){
         alert("Tamaño de imagen demasiado grande.");
         this.value = "";
      };
  };

  /* Asignar un tamaño máximo a las imagenes */
  var uploadField = document.getElementById("cambiarAvatar");
  uploadField.onchange = function() {
      if(this.files[0].size > 304800){
         alert("Tamaño de imagen demasiado grande.");
         this.value = "";
      };
  };

  /* Funcion para hacer una preview de la imagen que suba el usuario */
  var input = document.getElementById("cambiarAvatar");
  var preview = document.querySelector('.preview');
  input.style.opacity = 0;
  input.addEventListener('change', updateImageDisplay);

  /* Tipo de archivos permitidos */
  var fileTypes = ['image/jpeg', 'image/pjpeg','image/png'];
  // Ocultar los elementos con la class adm
  for (var i = 0; i < document.getElementsByClassName('adm').length; i++) {
    document.getElementsByClassName('adm')[i].style.display = "none";
  }
  // Añadir evento onclick ala clase op del navegador
  for (var i = 0; i < document.getElementsByClassName('op').length; i++) {
    document.getElementsByClassName('op')[i].addEventListener("click", mostrarElemento);
  }


  var tableUserEntries = document.getElementById('user-entries-table');
  // Funcion tabla a campo de Texto a tabla entradas usuario
  for(var i = 1; i < tableUserEntries.rows.length; i++) {
    tableUserEntries.rows[i].onclick = function() {
      document.getElementById("input-field-id").value = this.cells[0].innerHTML;
      document.getElementById("input-field-edit").value = this.cells[1].innerHTML;
      document.getElementById("input-textarea-edit").value = this.cells[2].innerHTML;
      document.getElementById("entrie-categori-edit").value = this.cells[3].innerHTML;
    };
  }

  var tableUsers = document.getElementById('adm-users-table');
  // Funcion tabla a campo de Texto a tabla entradas
  for(var i = 1; i < tableUsers.rows.length; i++) {
    tableUsers.rows[i].onclick = function() {
      document.getElementById("adm-username-edit").value = this.cells[0].innerHTML;
      document.getElementById("adm-pwd-edit").value = this.cells[1].innerHTML;
      document.getElementById("adm-email-edit").value = this.cells[3].innerHTML;
      document.getElementById("adm-name-edit").value = this.cells[4].innerHTML;
      document.getElementById("adm-surname-edit").value = this.cells[5].innerHTML;
      document.getElementById("adm-dateEdit").value = this.cells[6].innerHTML;
      document.getElementById("adm-sexo-edit").value = this.cells[7].innerHTML;
      document.getElementById("adm-type-edit").value = this.cells[2].innerHTML;
    };
  }

  var tableAdmEntries = document.getElementById('adm-entries-table');
  // Funcion tabla a campo de Texto a tabla entradas
  for(var i = 1; i < tableAdmEntries.rows.length; i++) {
    tableAdmEntries.rows[i].onclick = function() {
      document.getElementById("adm-entrie-field-edit-id").value = this.cells[0].innerHTML;
      document.getElementById("adm-entrie-field-edit").value = this.cells[1].innerHTML;
      document.getElementById("adm-entrie-textarea-edit").value = this.cells[2].innerHTML;
      document.getElementById("adm-entrie-categori-edit").value = this.cells[3].innerHTML;
      document.getElementById("adm-entrie-dateEdit").value = this.cells[5].innerHTML;
      document.getElementById("adm-user-publi").value = this.cells[6].innerHTML;
    };
  }

  /* FIN - Panel de administracion */


}

// Funcion del nevegador para el usuario logueado
function dropdown() {
  document.getElementById("dropdown").classList.toggle('active');
}

function localStorage() {
    if(document.getElementById("local-storage").checked ){
        localStorage.setItem('usuario',document.getElementById("nombreDeUsuario").value);
        localStorage.setItem('contraseña',document.getElementById("confirmPassword").value);
    }
    else{
        localStorage.removeItem('usuario');
        localStorage.removeItem('contraseña');
    }
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

/* Funcion del contador de comentarios */
function countComentarios() {
  var element = document.getElementById('contador');
  var obj = document.getElementById('textarea-comment');

  obj.maxLength = 200;
  element.innerHTML = 200 - obj.value.length;

  if (170 - obj.value.length < 0) {
    element.style.color = 'red';

  } else {
    element.style.color = 'grey';
  }
}

/* Funcion del contador de comentarios */
function countEntradas() {
  var element = document.getElementById('contador');
  var obj = document.getElementById('input-textarea');

  obj.maxLength = 5000;
  element.innerHTML = 5000 - obj.value.length;

  if (4500 - obj.value.length < 0) {
    element.style.color = 'red';

  } else {
    element.style.color = 'grey';
  }
}

/*
 * Funcion para mostar una sección según el elmento elegido
* en el panel de administración
*/
function mostrarElemento(){
  // Accion por defecto para los li
  switch (this.id){
    case 'op1':
      document.getElementById('user-account').style.display = 'block';
      document.getElementById('user-entries').style.display = 'none';
      document.getElementById('adm-users').style.display = 'none';
      document.getElementById('adm-entries').style.display = 'none';
      break;
    case 'op2':
      document.getElementById('user-account').style.display = 'none';
      document.getElementById('user-entries').style.display = 'block';
      document.getElementById('adm-users').style.display = 'none';
      document.getElementById('adm-entries').style.display = 'none';
      break;
    case 'op3':
      document.getElementById('user-account').style.display = 'none';
      document.getElementById('user-entries').style.display = 'none';
      document.getElementById('adm-users').style.display = 'block';
      document.getElementById('adm-entries').style.display = 'none';
      break;
    case 'op4':
      document.getElementById('user-account').style.display = 'none';
      document.getElementById('user-entries').style.display = 'none';
      document.getElementById('adm-users').style.display = 'none';
      document.getElementById('adm-entries').style.display = 'block';
      break;
  }

}

/*
* Funcion para validar la entrada del usuario
*/
function validarEntrada() {
  tituloEntrada = document.getElementById("entrieTitle").value;
  contenidoEntrada  = document.getElementById("input-textarea").value;
  categoriaEntrada = document.getElementById("entrie-categori").value;

  if (tituloEntrada == null || tituloEntrada.length == 0 || tituloEntrada.length > 30 || /^\s+$/.test(tituloEntrada)) { // nombrePersona
    //msg.mostrarError("Se necesita nombre válido");
    alert("Titulo de entrada inválido o has excedido número de caracteres (max.30)");
    return false;
  }
  else if (contenidoEntrada == null || contenidoEntrada.length == 0 || /^\s+$/.test(contenidoEntrada)) { // apellidosPersona
    //msg.mostrarError("Se necesita apellido válido");
    alert("Ingresa contenido a tu entrada");
    return false;
  }
  else if (categoriaEntrada == null || categoriaEntrada.length == 0 || /^\s+$/.test(categoriaEntrada)) { // nombreUsuario
    //msg.mostrarError("Nombre de usuario incorrecto / usuario ya existe");
    alert("Selecciona una categoría válida");
    return false;
  }
  return true;
}
// Funcion para validar una entrada editada
function validarEditEntrada() {
  tituloEntrada = document.getElementById("input-field-edit").value;
  contenidoEntrada  = document.getElementById("input-textarea-edit").value;
  categoriaEntrada = document.getElementById("entrie-categori-edit").value;

  if (tituloEntrada == null || tituloEntrada.length == 0 || /^\s+$/.test(tituloEntrada)) { // nombrePersona
    //msg.mostrarError("Se necesita nombre válido");
    alert("Titulo de entrada inválido o has excedido número de caracteres (max.30)");
    return false;
  }
  else if (contenidoEntrada == null || contenidoEntrada.length == 0 || /^\s+$/.test(contenidoEntrada)) { // apellidosPersona
    //msg.mostrarError("Se necesita apellido válido");
    alert("Ingresa contenido a tu entrada");
    return false;
  }
  else if (categoriaEntrada == null || categoriaEntrada.length == 0 || /^\s+$/.test(categoriaEntrada)) { // nombreUsuario
    //msg.mostrarError("Nombre de usuario incorrecto / usuario ya existe");
    alert("Selecciona una categoría válida");
    return false;
  }
  return true;
}
// Funcion para validar la entrada editada por un administrador
function validarAdmEditEntrada() {
  tituloEntrada = document.getElementById("adm-entrie-field-edit").value;
  contenidoEntrada  = document.getElementById("adm-entrie-textarea-edit").value;
  categoriaEntrada = document.getElementById("adm-entrie-categori-edit").value;

  if (tituloEntrada == null || tituloEntrada.length == 0 || /^\s+$/.test(tituloEntrada)) { // nombrePersona
    //msg.mostrarError("Se necesita nombre válido");
    alert("Titulo de entrada inválido o has excedido número de caracteres (max.30)");
    return false;
  }
  else if (contenidoEntrada == null || contenidoEntrada.length == 0 || /^\s+$/.test(contenidoEntrada)) { // apellidosPersona
    //msg.mostrarError("Se necesita apellido válido");
    alert("Ingresa contenido a tu entrada");
    return false;
  }
  else if (categoriaEntrada == null || categoriaEntrada.length == 0 || /^\s+$/.test(categoriaEntrada)) { // nombreUsuario
    //msg.mostrarError("Nombre de usuario incorrecto / usuario ya existe");
    alert("Selecciona una categoría válida");
    return false;
  }
  return true;
}

function validarAdmEditUsuario() {

  nombreUsuario = document.getElementById("adm-username-edit").value;
  passwordUsuario = document.getElementById("adm-pwd-edit").value;
  email = document.getElementById("adm-email-edit").value;
  nombrePersona = document.getElementById("adm-name-edit").value;
  apellidosPersona  = document.getElementById("adm-surname-edit").value;

  if (nombrePersona == null || nombrePersona.length == 0 || /^\s+$/.test(nombrePersona)) { // nombrePersona
    //msg.mostrarError("Se necesita nombre válido");
    return false;
  }
  else if (apellidosPersona == null || apellidosPersona.length == 0 || /^\s+$/.test(apellidosPersona)) { // apellidosPersona
    //msg.mostrarError("Se necesita apellido válido");
    return false;
  }
  else if (nombreUsuario == null || nombreUsuario.length == 0 || /^\s+$/.test(nombreUsuario)) { // nombreUsuario
    //msg.mostrarError("Nombre de usuario incorrecto / usuario ya existe");
    return false;
  }
  else if (passwordUsuario == null || passwordUsuario.length == 0 || /^\s+$/.test(passwordUsuario)) { // passwordUsuario
    //msg.mostrarError("La contraseña debe tener un minimo de 8 carácteres");
    return false;
  }
  else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) { // Validar el email
    //msg.mostrarError("Debe insertar una dirección de correo válido");
    return false;
  }
  return true;
}

/* Actualizar la visualización de la imagen que ha elegido el usuario */
function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  var curFiles = input.files;
  if(curFiles.length === 0) {
    var para = document.createElement('p');
    para.textContent = 'No se ha seleccionado ningun archivo';
    preview.appendChild(para);
  } else {
    var list = document.createElement('ol');
    preview.appendChild(list);
    for(var i = 0; i < curFiles.length; i++) {
      var listItem = document.createElement('li');
      var para = document.createElement('p');
      if(validFileType(curFiles[i])) {
        para.textContent = 'Nombre de la imagen: ' + curFiles[i].name + ', tamaño archivo ' + returnFileSize(curFiles[i].size) + '.';
        var image = document.createElement('img');
        image.src = window.URL.createObjectURL(curFiles[i]);

        listItem.appendChild(image);
        listItem.appendChild(para);

      } else {
        para.textContent = 'Nombre de la imagen: ' + curFiles[i].name + ': No es un tipo válido de imagen. Intenta subir en otro formato.';
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
  }
}
// Validar el tipo de archivo
function validFileType(file) {
  for(var i = 0; i < fileTypes.length; i++) {
    if(file.type === fileTypes[i]) {
      return true;
    }
  }
  return false;
}
/* Devolver el tamaño de archivo que ha subido en KB o MB */
function returnFileSize(number) {
  if(number < 1024) {
    return number + 'bytes';
  } else if(number >= 1024 && number < 1048576) {
    return (number/1024).toFixed(1) + 'KB';
  } else if(number >= 1048576) {
    return (number/1048576).toFixed(1) + 'MB';
  }
}

// Funcion para buscar elementos en una tabla entradas del usuario
function buscarTablaEntradas() {
  // Inicializar variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("user-searchfiled-0");
  filter = input.value.toUpperCase();
  table = document.getElementById("user-entries-table");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
