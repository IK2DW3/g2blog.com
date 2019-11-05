window.onload = function(){
  // Navegador para el usuario logueado
  if (!(document.getElementById("dropdownMenuButton").style.display == "none")) {
    document.getElementById("dropdownMenuButton").addEventListener("click", dropdown);
  }

  // Creacion y validación de comentarios
  document.getElementById('textarea-comment').addEventListener("keyup",count_descendente);

}

// Funcion del nevegador
function dropdown() {
  document.getElementById("dropdown").classList.toggle('active');
}

/* Funcion del contador de comentarios */
function count_descendente() {
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
