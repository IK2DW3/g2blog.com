window.onload = function() {
  /*
  * Fomulario para el cambio de imagen del usuario
  */

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

  /* Actualizar la visualización de la imagen */
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

  /* Tipo de archivos permitidos */
  var fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
  ]

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

  document.getElementById("op1").addEventListener("click", mostrarElemento);
  document.getElementById("op2").addEventListener("click", mostrarElemento);
  document.getElementById("op3").addEventListener("click", mostrarElemento);
  document.getElementById("user-entries").style.display = "none";
  document.getElementById("adm-users").style.display = "none";

  function mostrarElemento(){
    // Accion por defecto para Buttons;
    switch (this.id){
      case 'op1':
        document.getElementById('user-account').style.display = 'block';
        document.getElementById('user-entries').style.display = 'none';
        document.getElementById('adm-users').style.display = 'none';
        break;
      case 'op2':
        document.getElementById('user-account').style.display = 'none';
        document.getElementById('user-entries').style.display = 'block';
        document.getElementById('adm-users').style.display = 'none';
        break;
      case 'op3':
        document.getElementById('user-account').style.display = 'none';
        document.getElementById('user-entries').style.display = 'none';
        document.getElementById('adm-users').style.display = 'block';
        break;
    }

  }

  document.getElementById("myInput").addEventListener("keyup", myFunction);
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
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

}
