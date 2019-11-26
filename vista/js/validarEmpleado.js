function validarForm(){
    var nombresEmpleado = document.getElementById("nombresEmpleado").value;
    var apellidosEmpleado = document.getElementById("apellidosEmpleado").value;
    var nacimientoEmpleado = document.getElementById("nacimientoEmpleado").value;
    var edadEmpleado = document.getElementById("edadEmpleado").value;
    var direccionEmpleado = document.getElementById("direccionEmpleado").value;
    var telefonoEmpleado = document.getElementById("telefonoEmpleado").value;
    var cargoEmpleado = document.getElementById("cargoEmpleado").value;
    var emailEmpleado = document.getElementById("emailEmpleado").value;
    var documentoEmpleado = document.getElementById("documentoEmpleado").value;
    var expregemail=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;  
    var expregnombre=/^[a-zA-ZÑñÁáÉéÍíÓóÚú\s]+$/;
    var expregnumero=/^[0-9]+$/;
    
    if(nombresEmpleado.length == 0){
        Swal.fire({
            type: 'error',
            text: 'Debe escribir un nombre'
          }).then(function() {
            $('#nombresEmpleado').focus();
          });
          return false;
    }
    if(!expregnombre.test(nombresEmpleado)){
        Swal.fire({
            type: 'error',
            text: 'El campo nombre sólo acepta letras'
          }).then(function() {
            $('#nombresEmpleado').focus();
          });
          return false;
    }
    if(apellidosEmpleado.length == 0){
        Swal.fire({
            type: 'error',
            text: 'Debe escribir un apellido'
          }).then(function() {
            $('#apellidosEmpleado').focus();
          });
          return false;
    }
    if(!expregnombre.test(apellidosEmpleado)){
        Swal.fire({
            type: 'error',
            text: 'El campo apellido sólo acepta letras'
          }).then(function() {
            $('#apellidosEmpleado').focus();
          });
          return false;
    }
    if(nacimientoEmpleado.length == 0){
        Swal.fire({
          type: 'error',
          text: 'Debe Ingresar Una Fecha De Nacimiento'
      }).then(function(){
          $('#nacimientoEmpleado').focus();
      });
      return false;  
    }
    if(edadEmpleado.length == 0){
        Swal.fire({
            type: 'error',
            text: 'Debe escribir una edad'
          }).then(function() {
            $('#edadEmpleado').focus();
          });
          return false;
    }
    if(!expregnumero.test(edadEmpleado)){
        Swal.fire({
            type: 'error',
            text: 'El campo edad sólo acepta números'
        }).then(function() {
            $('#edadEmpleado').focus();
        });
        return false;
    }
    if(edadEmpleado < 16 || edadEmpleado > 80 ){
        Swal.fire({
            type: 'error',
            text: 'Debe escribir una edad valida',
            footer: '<small> La edad mínima es 16 y la máxima es 80</small>'
          }).then(function() {
            $('#edadEmpleado').focus();
          });
          return false;
    }
    if(direccionEmpleado.length == 0){
        Swal.fire({
            type: 'error',
            text: 'Debe escribir una dirección residencial'
        }).then(function(){
            $('#direccionEmpleado').focus();
        });
        return false;  
    }
    if(telefonoEmpleado.length == 0){
        Swal.fire({
            type: 'error',
            text: 'Debe escribir un número de telefono'
        }).then(function(){
            $('#telefonoEmpleado').focus();
        });
        return false;  
    }
    if(!expregnumero.test(telefonoEmpleado)){
        Swal.fire({
            type: 'error',
            text: 'El campo teléfono sólo acepta números'
        }).then(function(){
            $('#telefonoEmpleado').focus();
        });
        return false;  
    }
    if(frmEmpleado.generoEmpleado[0].checked == true || frmEmpleado.generoEmpleado[1].checked == true || frmEmpleado.generoEmpleado[2].checked == true){
    }else{
        Swal.fire({
            type: 'error',
            text: 'Debe elegir un género'
        }).then(function(){
            $('#generoEmpleado').focus();
        });
        return false;
    }
    if(cargoEmpleado.length  == 0){
        Swal.fire({
            type: 'error',
            text: 'Escriba el cargo'
        }).then(function(){
            $('#cargoEmpleado').focus();
        });
        return false;
    }
    if(emailEmpleado.length == 0){
        Swal.fire({
            type: 'error',
            text: 'Escriba el correo'
        }).then(function(){
            $('#emailEmpleado').focus();
        });
        return false;
    }
    if(!expregemail.test(emailEmpleado)){
        Swal.fire({
            type: 'error',
            text: 'Debe escribir un email valido',
            footer: '<small> ejemplo@ejemplo.com </small>'
        }).then(function(){
            $('#emailEmpleado').focus();
        });
        return false;  
    }
    if(documentoEmpleado.length == 0){
        Swal.fire({
            type: 'error',
            text: 'Escriba el número de identificación'
        }).then(function(){
            $('#documentoEmpleado').focus();
        });
        return false;
    }
}


