window.onload = function() {
  // Funcion del nevegador
  function dropdown() {
    document.getElementById("dropdown").classList.toggle('active');
  }
  // Navegador para el usuario logueado
  document.getElementById("dropdownMenuButton").addEventListener("click", dropdown);
}
