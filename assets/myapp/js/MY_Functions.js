/* START - CONTROLLER: Session */
function verifyenterkeypressed(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 13){
        validateuserlogin();
    }
}

function validateuserlogin(){
    var url = myBase_url+"index.php/Session/validatelogin";
    var user = $('#user').val();
    var pass = $('#password').val();
    $('#fountainTextG').show();
    $.post(url,
            {
                user:user,
                pass: pass
            }, function(data){
                sendresponsetouser(data);
    });
}
function ResetUserLogin(){

    var userreset = $("#userreset").val();
    var passreset = $("#passwordreset").val();

    if (userreset != ""  && passreset != "") {

        $.ajax({
            url:myBase_url+"index.php/Session/ResetLogin",
            type:'POST',
            data:{userreset:userreset,passreset:passreset},
            async: true,
            success:function(datos){
                var response = JSON.parse(datos);

                if (response == "UWOA") {

                    swal("Error","Usuario sin acceso a esta aplicación","error");

                }else if(response == "IUOP"){

                    swal("Error","Usuario o contraseña incorecta","error");
                }else{

                    swal({
                        title: "Exito",
                        text: "Se ha reseteado la sesion con exito",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                        cancelButtonText: "No, Cancelar",
                        closeOnConfirm: true,
                        closeOnCancel: false
                    }, function(isConfirm){

                         location.href = "";
                    });
                 }

            },
            error:function(){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });

    }else{

        swal("Cuidado", "Aun quedan campos vacios", "warning")
    }

}

function sendresponsetouser(data){
    var dato = data.trim();
    if(dato.substring(0,3) === "OK-"){
        openurl(dato);
    }else if(dato.substring(0,4)==="UWOA"){
        displaymessage("Usuario sin acceso a esta aplicación" );
    }else if(dato.substring(0,4)==="IUOP"){
        displaymessage("Usuario y/o contraseña incorrectos");
    } else if(dato.substring(0,4)==="UWAS"){
        displaymessage("Usuario ya cuenta con una sesion activa");
    } else{
        displaymessage(data);
    }
}

function openurl(str){
    $('#fountainTextG').hide();
    var sp = str.split("-");
    var url = myBase_url+"index.php/"+sp[1];
    window.location.href = url;
}

function displaymessage(message){
    $('#fountainTextG').hide();
    var msg = '<div class="alert alert-danger alert-dismissable fade in">\n\
                    <button type="button" class="close close-sm" data-dismiss="alert" >\n\
                    <i class="md md-close"></i>\n\
                    </button>\n\
                    <strong>¡Error!</strong>&nbsp;'+message+'&nbsp;\n\
               </div>';
    $('#displayUserErrors').html(msg);
    setTimeout(closeresponsetouser, 10000);
}

function closeresponsetouser(){
    $('#displayUserErrors').children().fadeToggle(500,function(){
        $('#displayUserErrors').empty();
    });

}

function LogOut(){

    $.ajax({
        url:myBase_url+"index.php/Session/logout",
        type:'GET',
        async: true,
        success:function(datos){
            swal({
                title: "Error",
                text: "La sesion ha caducado, porfavor inicia sesion de nuevo",
                type: "error",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                    location.href = myBase_url+"index.php/Session";
            });
        }
    });
}


function CheckUActivo(){

    $.ajax({
        url:myBase_url+"index.php/Session/EstadoU",
        type:'GET',
        async: true,
        success:function(datos){
            var obj = JSON.parse(datos);

            if(obj != ""){
                console.log("OK");
            }else{
                $.ajax({
                    url:myBase_url+"index.php/Session/logout",
                    type:'GET',
                    async: true,
                    success:function(datos){
                        swal({
                            title: "Error",
                            text: "Tu cuenta ha sido eliminada, para mayor informacion acude con el administrador",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "OK",
                            cancelButtonText: "Cancelar",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }, function(isConfirm){
                                location.href = myBase_url+"index.php/Session";
                        });
                    }
                });
            }
        }
    });

}


/* END - CONTROLLER: Session */

/* =============================================================================================================================================================================================================================== */

/* START - CONTROLLER: Dashbord */

function VerificaUsuario(){

  var usuario = $('#username').val();

  if (usuario!=""){
    $.ajax({
        url:myBase_url+"index.php/Usuarios/CheckUsuarioExistente",
        type:'POST',
        data:{usuario:usuario},
        async: true,
        success:function(datos){

          var obj = JSON.parse(datos);

          if (obj!=""){
            swal("Alerta","El usuario ya existe. Ingrese uno nuevo","warning");
          }
        },

        error:function(){
          swal("Error","Ha ocurrido un error. Inténtelo de nuevo","error");
        }
    });
  }else {
    swal("Alerta","El campo de usuario esta vacio","warning");
  }

}

function GuardarUsuario(){

    var nombre = $('#nombre').val();
    var apaterno = $('#apaterno').val();
    var amaterno = $('#amaterno').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var ocupacion = $('#ocupacion').val();
    var rol = $('#rol').val();

    if(nombre != "" && apaterno != "" && amaterno != "" && telefono != "" && email != "" && username != "" && password != "" && rol != ""){
        $.ajax({
            url:myBase_url+"index.php/Session/SaveUser",
            type:'POST',
            data:{nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,username:username,password:password,rol:rol},
            async: true,
            success:function(datos){
                swal({
                    title: "Exito",
                    text: "Se ha guardado el usuario con exito",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: false
                }, function(isConfirm){
                    location.href = "";
                });
            },
        });
    }else{
        swal("Cuidado","Aun existen campos vacios","warning");
    }
}

function EditarUsuario($id){


    var id = $id;
    $.ajax({
        url:myBase_url+"index.php/Usuarios/UsuarioPorID",
        type:'POST',
        data:{id:id},
        async: true,
        success:function(datos){

            var obj = JSON.parse(datos);
            console.log(obj);

           var id = obj [0].id_usuario;
           var nombre = obj [0].nombre;
           var apaterno = obj [0].apaterno;
           var amaterno = obj [0].amaterno;
           var telefono = obj [0].telefono;
           var email = obj [0].email;
           var username = obj [0].username;
           var password = obj [0].password;
           var ocupacion = obj [0].ocupacion;
           var rol = obj [0].rol;
           var estado = obj [0].estado;

           $('#username').attr('disabled',true);
           $('#password').attr('disabled',true);
           $('#botonGuardar').hide();
           $('#botonActualizar').show();
           $('#divestado').show();
           $('#id_user').val(id);
           $('#nombre').val(nombre);
           $('#apaterno').val(apaterno);
           $('#amaterno').val(amaterno);
           $('#telefono').val(telefono);
           $('#email').val(email);
           $('#username').val(username);
           $('#password').val(password);
           $('#rol').val(rol);
           $('#ocupacion').val(ocupacion);
           $('#estado').val(estado);


         }, error:function (){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
});


}

function UpdateUsuario(){


    var id = $('#id_user').val();
    var nombre = $('#nombre').val();
    var apaterno = $('#apaterno').val();
    var amaterno = $('#amaterno').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var rol = $('#rol').val();
    var ocupacion = $('#ocupacion').val();
    var estado = $('#estado').val();


    if(id != "" && nombre != "" && apaterno != "" && amaterno != "" && telefono != "" && email !="" && username != "" && password != "" && rol !="" && ocupacion !="" && estado !=""){

        $.ajax({
            url:myBase_url+"index.php/Usuarios/UpdateUser",
            type:'POST',
            data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,username:username,password:password,ocupacion:ocupacion,rol:rol,estado:estado},
            async: true,
            success:function(datos){

                swal({
                    title: "Exito",
                    text: "Se ha actualizado el usuario con exito ",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: false
                }, function(isConfirm){
                        location.href = "";
                });


            },error:function (){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });



    }

}

function BorrarUsuario($id){
  var id = $id;
  swal({
    title: "ADVERTENCIA",
    text: "¿Seguro que desea borrar?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "OK",
    cancelButtonText: "Cancelar",
    closeOnConfirm: false,
    closeOnCancel: true
  }, function(isConfirm){
    if(isConfirm){
      $.ajax({
        url:myBase_url+"index.php/Usuarios/DeleteUser",
        type: 'POST',
        data:{id:id},
        async: true,
        success:function(datos){
          swal({
            title: "Listo",
            type: "success",
            text: "Se borro el usuario con exito",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true
          }, function(isConfirm){
              location.href = "";
          });
        }
      });
    }
  });
}

function BorrarUsuario($id){

   var id = $id;

   $.ajax({
       url:myBase_url+"index.php/Usuarios/UsuarioPorID",
       type:'POST',
       data:{id:id},
       async: true,
       success:function(datos){

         var obj = JSON.parse(datos);
         console.log(obj);

         var id = obj [0].id_usuario;
         var nombre = obj [0].nombre;
         var apaterno = obj [0].apaterno;
         var amaterno = obj [0].amaterno;
         var telefono = obj [0].telefono;
         var email = obj [0].email;
         var username = obj [0].username;
         var password = obj [0].password;
         var ocupacion = obj [0].ocupacion;
         var rol = obj [0].rol;
         var estado = obj [0].estado;

         $('#id_user').val(id);
         $('#nombre').val(nombre);
         $('#apaterno').val(apaterno);
         $('#amaterno').val(amaterno);
         $('#telefono').val(telefono);
         $('#email').val(email);
         $('#username').val(username);
         $('#password').val(password);
         $('#rol').val(rol);
         $('#ocupacion').val(ocupacion);
         $('#estado').val(estado);

       },error:function(){
         swal("Error","Ha ocurrido un error intentelo de nuevo","error");
       }
   });

   swal({
     title: "ADVERTENCIA",
     text: "¿Seguro que desea borrar?",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "OK",
     cancelButtonText: "Cancelar",
     closeOnConfirm: false,
     closeOnCancel: true
   },function(isConfirm){
     if(isConfirm){

       var id = $('#id_user').val();
       var nombre = $('#nombre').val();
       var apaterno = $('#apaterno').val();
       var amaterno = $('#amaterno').val();
       var telefono = $('#telefono').val();
       var email = $('#email').val();
       var username = $('#username').val();
       var password = $('#password').val();
       var rol = $('#rol').val();
       var ocupacion = $('#ocupacion').val();
       var estado = $('#estado').val();

       $.ajax({
           url:myBase_url+"index.php/Usuarios/DeleteUser",
           type:'POST',
           data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,username:username,password:password,ocupacion:ocupacion,rol:rol,estado:estado},
           async: true,
           success:function(datos){

               swal({
                   title: "Exito",
                   text: "Se ha eliminado el usuario con exito ",
                   type: "success",
                   showCancelButton: false,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "OK",
                   cancelButtonText: "No, Cancelar",
                   closeOnConfirm: true,
                   closeOnCancel: false
               }, function(isConfirm){
                       location.href = "";
               });
           },error:function (){
               swal("Error","Ha ocurrido un error intentelo de nuevo","error");
           }
       });
     }
   });
}

/* END - CONTROLLER: Dashboard */


 /*START CONTROLLER CLIENTES*/

 function RellenaHorarioFunciones(){

     var cliente = $('#cliente').val();
     var fecha1 = $('#fecha1').val();
     var fecha2 = $('#fecha2').val();
     var anio = $('#anio').val();

     if (cliente != "" && fecha1 != "" && fecha2 != "" && anio != ""){

     $.ajax({
        url:myBase_url+"index.php/Calendario/HorariosCliente",
        type:'POST',
        data:{cliente:cliente,fecha1:fecha1,fecha2:fecha2,anio:anio},
        async: true,
        success:function(datos){
          $("#calendario").show();
        },error:function (){
            swal("Error","Ha ocurrido un error intentelo de nuevo","error");
        }
    });
 }else {
   swal("Cuidado", "Aun quedan campos vacíos", "warning");
 }
}

 function AgregarHorario(){

   //
   //   $.ajax({
   //       url:myBase_url+"index.php/Horario/ConsultaHorario",
   //       type:'POST',
   //       data:{cliente:cliente,fecha1:fecha1,fecha2:fecha2,anio:anio},
   //       async: true,
   //       success:function(datos){
   //           swal({
   //               title: "Exito",
   //               text: "Se ha guardado cliente con exito ",
   //               type: "success",
   //               showCancelButton: false,
   //               confirmButtonColor: "#DD6B55",
   //               confirmButtonText: "OK",
   //               cancelButtonText: "No, Cancelar",
   //               closeOnConfirm: true,
   //               closeOnCancel: false
   //           }, function(isConfirm){
   //                   location.href = "";
   //           });
   //       },
   //       error:function (){
   //           swal("Error","Ha ocurrido un error intentelo de nuevo","error");
   //       }
   //   });
   // }else {
   //   swal("Cuidado", "Aun quedan campos vacíos", "warning");
   // }

 }


 function GuardarCliente(){

         var nombre = $('#nombre').val();
         var apaterno = $('#apaterno').val();
         var amaterno = $('#amaterno').val();
         var telefono = $('#telefono').val();
         var email = $('#email').val();
         var empresa = $('#empresa').val();

     if(nombre !="" && apaterno != "" && amaterno != "" && telefono != "" && email != "" && empresa != ""){

         $.ajax({
             url:myBase_url+"index.php/Clientes/SaveCliente",
             type:'POST',
             data:{nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,empresa:empresa},
             async: true,
             success:function(datos){
                 swal({
                     title: "Exito",
                     text: "Se ha guardado cliente con exito ",
                     type: "success",
                     showCancelButton: false,
                     confirmButtonColor: "#DD6B55",
                     confirmButtonText: "OK",
                     cancelButtonText: "No, Cancelar",
                     closeOnConfirm: true,
                     closeOnCancel: false
                 }, function(isConfirm){
                         location.href = "";
                 });
             },
             error:function (){
                 swal("Error","Ha ocurrido un error intentelo de nuevo","error");
             }
         });

     }else {
         swal("Alerta","Aun existen campos vacios","warning");
     }

 }

 function EditarCliente($id){

     var id = $id;

     $.ajax({
         url:myBase_url+"index.php/Clientes/ClientePorID",
         type:'POST',
         data:{id:id},
         async: true,
         success:function(datos){

             var obj = JSON.parse(datos);
             console.log(obj);

            var id = obj [0].id_cliente;
            var nombre = obj [0].nombre;
            var apaterno = obj [0].apaterno;
            var amaterno = obj [0].amaterno;
            var telefono = obj [0].telefono;
            var email = obj [0].email;
            var empresa = obj [0].empresa;
            var token = obj [0].token;
            var estado = obj [0].estado;

            $('#token').attr('disabled',true);
            $('#password').attr('disabled',true);
            $('#botonGuardarCliente').hide();
            $('#botonActualizarCliente').show();
            $('#divestadoc').show();
            $('#divtoken').show();
            $('#id_client').val(id);
            $('#nombre').val(nombre);
            $('#apaterno').val(apaterno);
            $('#amaterno').val(amaterno);
            $('#telefono').val(telefono);
            $('#email').val(email);
            $('#empresa').val(empresa);
            $('#token').val(token);
            $('#estado').val(estado);


          }, error:function (){
                 swal("Error","Ha ocurrido un error intentelo de nuevo","error");
             }
 });


 }

 function UpdateCliente(){


     var id = $('#id_client').val();
     var nombre = $('#nombre').val();
     var apaterno = $('#apaterno').val();
     var amaterno = $('#amaterno').val();
     var telefono = $('#telefono').val();
     var email = $('#email').val();
     var empresa = $('#empresa').val();
     var token = $('#token').val();
     var estado = $('#estado').val();


     if(id != "" && nombre != "" && apaterno != "" && amaterno != "" && telefono != "" && email !="" && empresa != "" && token != "" && estado !=""){

         $.ajax({
             url:myBase_url+"index.php/Clientes/UpdateClient",
             type:'POST',
             data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,empresa:empresa,token:token,estado:estado},
             async: true,
             success:function(datos){

                 swal({
                     title: "Exito",
                     text: "Se ha actualizado el cliente con exito ",
                     type: "success",
                     showCancelButton: false,
                     confirmButtonColor: "#DD6B55",
                     confirmButtonText: "OK",
                     cancelButtonText: "No, Cancelar",
                     closeOnConfirm: true,
                     closeOnCancel: false
                 }, function(isConfirm){
                         location.href = "";
                 });


             },error:function (){
                 swal("Error","Ha ocurrido un error intentelo de nuevo","error");
             }
         });
     }

 }

 function BorrarCliente($id){

    var id = $id;

    $.ajax({
        url:myBase_url+"index.php/Clientes/ClientePorID",
        type:'POST',
        data:{id:id},
        async: true,
        success:function(datos){

          var obj = JSON.parse(datos);
          console.log(obj);

          var id = obj [0].id_cliente;
          var nombre = obj [0].nombre;
          var apaterno = obj [0].apaterno;
          var amaterno = obj [0].amaterno;
          var telefono = obj [0].telefono;
          var email = obj [0].email;
          var empresa = obj [0].empresa;
          var token = obj [0].token;
          var estado = obj [0].estado;

          $('#id_client').val(id);
          $('#nombre').val(nombre);
          $('#apaterno').val(apaterno);
          $('#amaterno').val(amaterno);
          $('#telefono').val(telefono);
          $('#email').val(email);
          $('#empresa').val(empresa);
          $('#token').val(token);
          $('#estado').val(estado);

        },error:function(){
          swal("Error","Ha ocurrido un error intentelo de nuevo","error");
        }
    });

    swal({
      title: "ADVERTENCIA",
      text: "¿Seguro que desea borrar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "OK",
      cancelButtonText: "Cancelar",
      closeOnConfirm: false,
      closeOnCancel: true
    },function(isConfirm){
      if(isConfirm){

        var id = $('#id_client').val();
        var nombre = $('#nombre').val();
        var apaterno = $('#apaterno').val();
        var amaterno = $('#amaterno').val();
        var telefono = $('#telefono').val();
        var email = $('#email').val();
        var empresa = $('#empresa').val();
        var token = $('#token').val();
        var estado = $('#estado').val();

        $.ajax({
            url:myBase_url+"index.php/Clientes/DeleteClient",
            type:'POST',
            data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,empresa:empresa,token:token,estado:estado},
            async: true,
            success:function(datos){

                swal({
                    title: "Exito",
                    text: "Se ha eliminado el cliente con exito ",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: false
                }, function(isConfirm){
                        location.href = "";
                });
            },error:function (){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });
      }
    });
}

  /*END CONTROLLER CLIENTES */




/* =============================================================================================================================================================================================================================== */


/* =============================================================================================================================================================================================================================== */


/* =============================================================================================================================================================================================================================== */
