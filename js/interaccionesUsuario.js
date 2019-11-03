window.onload = function(){
  // Navegador para el usuario logueado
  if (document.getElementById("dropdownMenuButton").style.display != "none") {
    document.getElementById("dropdownMenuButton").addEventListener("click", dropdown);
  }

}
function dropdown() {
  document.getElementById("dropdown").classList.toggle('active');
}
