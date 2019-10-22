window.onload = function() {
  document.getElementById("dropdownMenuButton").onclick = dropdown;
}

function dropdown() {
  var buttomMenu = document.getElementById("dropdown-menu");

  if (buttomMenu.style.display == "none") {
    buttomMenu.style.display == "absolute";
  } else {
    buttomMenu.style.display == "none";
  }
}
