window.onload = function(){
  // Navegador para el usuario logueado
  document.getElementById("dropdownMenuButton").addEventListener("click", dropdown);

  function dropdown() {
    document.getElementById("dropdown").classList.toggle('active');
  }

}
