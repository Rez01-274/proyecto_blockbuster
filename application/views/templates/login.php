<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de Transmisión de peliculas">
        <meta name="author" content="Fabian Gael Arias Jiménez">

        <link rel="shortcut icon" href="<?php echo base_url('assets/myapp/img/img/block.png'); ?>">
        <title><?= $tabTitle; ?></title>

        <?php
        /* Dependencias requeridas para el funcionamiento del LOGIN */
        /* ==============================================================
                <---  CSS TEMPLATE  --->
           ============================================================== */
            echo link_tag('assets/darktemplate/css/bootstrap.min.css');
            echo link_tag('assets/darktemplate/css/core.css');
            echo link_tag('assets/darktemplate/css/components.css');
            echo link_tag('assets/darktemplate/css/icons.css');
            echo link_tag('assets/darktemplate/css/pages.css');
            echo link_tag('assets/darktemplate/css/responsive.css');
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');

        /* ==============================================================
                <---  JS TEMPLATE  --->
           ============================================================== */
            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/js/jquery.min.js");
            echo script_tag("assets/darktemplate/js/bootstrap.min.js");
            echo script_tag('assets/darktemplate/js/fastclick.js');
            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");

        /* ==============================================================
                <---  JS MYAPP  --->
           ============================================================== */
            echo script_tag("assets/myapp/js/MY_Functions.js");
        ?>

        <script type="text/javascript">
            //var resizefunc = [];
            var myBase_url = '<?php echo base_url();?>';

            $(document ).ready(function() {
                //alert($().jquery);

                window.location.hash="no-back-button";
                window.location.hash="Again-No-back-button" //chrome
                window.onhashchange=function(){window.location.hash="no-back-button";}

                $("#registro").hide();
                $("#resettab").hide();


            });

            function ShowPanel(){

                $("#registro").show();
                $("#logintab").hide();
            }

            function ShowPanelReset(){

              $("#resettab").show();
              $("#logintab").hide();

            }

            function CheckPass(){

              var pass = $("#pass").val();
              var pass1 = $("#pass1").val();

              if(pass != pass1){

                $("#pass").val("");
                $("#pass1").val("");
                swal("Cuidado","Las contraseñas no coinciden","warning");
              }

            }

        </script>

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    </head>

    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page" >
            <div class="navbar-default card-box" id="lo">
                <div id="displayUserErrors"></div>
                <div class="panel-heading">
                    <div align="center">&emsp;&emsp;&emsp;<img src="<?php echo base_url("assets/myapp/img/img/block.png") ?>" width="300px" height="150px" style= "padding-right: 20px"><br></div>
                    <h2 class="text-center"> <strong class="text-black">BlockBuster</strong> </h2>
                </div>
                <div class="panel-body" >

                    <div id="logintab">

                        <form class="form-horizontal m-t-20" action="#" id="inicio">
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" id="user" placeholder="Usuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" required="" id="password" onkeypress="return verifyenterkeypressed(event)" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="fountainTextG" hidden="true" align="center">

                                    <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                                </div>
                            </div>
                            <div class="form-group text-center m-t-40">
                                <div class="col-xs-12">
                                    <a href="#" onClick="validateuserlogin();" class="btn btn label-primary btn-block text-uppercase text-white waves-effect waves-light">Entrar</a>
                                    <!--<a href="#" onClick="modoinvitado();" class="btn btn-success btn-block text-uppercase waves-effect waves-light">Invitado</a>-->
                                </div>

                                <br>
                                <br>

                                <!--<div align="center">
                                  <button class="btn btn-primary waves-effect waves-light" onClick="ShowPanel();">Registro de Usuario</button>
                                </div>-->

                                <br>

                                <div align="center">
                                  <button class="btn label-primary text-white waves-effect waves-light" onClick="ShowPanel();">Registrate aquí</button>
                                </div>
                                <br>
                                <div align="center">
                                  <button class="btn label-primary text-white waves-effect waves-light" onClick="ShowPanelReset();">Reseteo de Sesion</button>
                                </div>
                            </div>

                    </div>

                    <div id="resettab">

                        <div class="form-group">
                            <div class="">
                                <input class="form-control" type="text" required="" id="userreset" placeholder="Usuario">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <input class="form-control" type="password" required="" id="passwordreset" placeholder="Contraseña">
                            </div>
                        </div>

                        <div class="">
                            <a href="#" onClick="ResetUserLogin();" class="btn btn-primary btn-block text-uppercase waves-effect waves-light">Reset</a>

                        </div>

                    </div>
                    <div id="registro">
                        <form role="form" method="" id="">
                            <div class="box-body">

                                <div class="form-group ">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" required="" id="id_user" style="display:none">
                                    <input class="form-control" type="text" required="" id="nombre" placeholder="Nombre">
                                </div>

                                <div class="form-group ">
                                    <label for="nombre">Apellido paterno</label>
                                    <input class="form-control" type="text" required="" id="apaterno" placeholder="Apellido paterno">
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Apellido Materno</label>
                                    <input class="form-control" type="text" required="" id="amaterno" placeholder="Apellido Materno">
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Telefono</label>
                                    <input class="form-control" type="text" required="" id="telefono" placeholder="Telefono">
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Email</label>
                                    <input class="form-control" type="text" required="" id="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Usuario</label>
                                    <input class="form-control" type="text" required="" id="username" placeholder="Usuario"
                                    onblur="VerificaUsuario();">
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Contraseña</label>
                                    <input class="form-control" type="password" required="" id="password" placeholder="Contraseña">
                                </div>

                                <div class="form-group">

                                    <label for="rol">Rol</label>
                                    <select id="rol" name="rol" class="form-control" style="">
                                    <option value="" >Elije Rol</option>
                                    <option value="A" >Administrador</option>
                                    <option value="E" >Empleado</option>
                                    </select>

                                </div>

                                <div class="form-group" id="divestado" style="display:none">

                                    <label for="estado">Estado</label>
                                    <select id="estado" name="estado" class="form-control">
                                    <option value="" >Elije Estado</option>
                                    <option value="1" >Activo</option>
                                    <option value="0" >Inactivo</option>
                                    </select>

                                </div>

                            </div>

                            <br>

                            <div align="left">
                                <button class="btn btn-primary waves-effect waves-light" onClick="GuardarUsuario();" id="botonGuardar">Guardar</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
