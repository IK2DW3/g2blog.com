window.onload = function(){
  // put your code here
  document.getElementById("dropdownMenuButton").addEventListener("click", dropdown);
  function dropdown() {
    document.getElementById("dropdown-menu").classList.toggle('active');
  }
}
/*
document.addEventListener("click", function(){
  document.getElementById("dropdownMenuButton").innerHTML = "Hello World";
});
*/
