<!-- Content Wrapper. Contains page content -->

 <?php
 /* Dependencias requeridas para el funcionamiento de la DataTable */
/* ==============================================================
        <---  CSS TEMPLATE  --->
        ============================================================== */

        echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');

/* ==============================================================
        <---  JS TEMPLATE  --->
        ============================================================== */

        echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
        echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");

/* ==============================================================
        <---  JS MYAPP  --->
        ============================================================== */
         echo script_tag("assets/myapp/js/MY_Functions.js");
        ?>


<html>
<head>
    <meta charset="utf-8">

</head>

<script>
    var resizefunc = [];

    $(document).ready(function() {


    });


</script>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Clientes</h4>

                        </div>
                    </div>

                    <br>

                    <div class="col-lg-4">
                      <div class="panel panel-border panel-info">
                          <div class="panel-heading">
                            <h3 class="panel-title">Clientes</h3>
                          </div>
                          <div class="panel-body">
                            <!-- form start -->
                              <form role="form" method="" id="">
                                <div class="box-body">

                                    <div class="form-group ">
                                        <label for="nombre">Nombre</label>
                                        <input class="form-control" type="text" required="" id="id_client" style="display:none">
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
                                        <label for="nombre">Empresa</label>
                                        <input class="form-control" type="text" required="" id="empresa" placeholder="Empresa">
                                    </div>

                                    <div class="form-group" style="display:none" id="divtoken">
                                        <label for="nombre">Token</label>
                                        <input class="form-control" type="text" required="" id="token" placeholder="Token">
                                    </div>

                                    <div class="form-group" id="divestadoc" style="display:none">

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
                                  <button class="btn btn-primary waves-effect waves-light" onClick="GuardarCliente();" id="botonGuardarCliente">Guardar</button>
                                </div>

                                <div align="left">
                                  <button class="btn btn-primary waves-effect waves-light" onClick="UpdateCliente();" id="botonActualizarCliente" style="display:none">Actualizar</button>
                                </div>

                                </form>
                            </div>

                      </div>
              </div>


          <div class="col-lg-8">
              <div class="panel panel-border panel-info">
                  <div class="panel-heading">
                      <h3 class="panel-title">Listado de Clientes</h3>
                  </div>
                  <div class="table-responsive">
                    <div class="panel-body">
                      <table id="datatable" class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Empresa</th>
                            <th>Editar</th>
                            <th>Borrar</th>

                          </tr>
                        </thead>
                        <tbody>

                          <?php

                          $valores = count($clientes);
                          for ($i=0; $i < $valores ; $i++) {
                            $res = $clientes[$i];
                            $id = $res -> id_cliente;
                            $nombre = $res -> nombre;
                            $apaterno= $res -> apaterno;
                            $amaterno = $res -> amaterno;
                            $email = $res -> email;
                            $empresa = $res -> empresa;


                            $nombre_completo = $nombre . ' ' .$apaterno. ' ' .$amaterno;

                            echo "
                            <tr>
                              <td>$nombre_completo</td>
                              <td>$email</td>
                              <td>$empresa</td>";

                              echo "<td>";
                              echo "<a href='#' id='Editar' onclick='EditarCliente($id)'><i class='fa fa-pencil'></i> </a>
                              </td>";

                              echo "<td>";
                              echo "<a href='#' id='Borrar' onclick='BorrarCliente($id)'><i class='fa fa-close'></i> </a>
                              </td>";

                            echo "</tr>";
                          }
                        ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div>



        </div> <!-- container -->
    </div> <!-- content -->

    <footer class="footer">
         <?= date('Y')?> &copy;
    </footer>

</div>
<!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->



    </div>
    <!-- END wrapper -->

</body>
</html>
