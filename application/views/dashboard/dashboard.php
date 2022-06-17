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
        <?php
            echo link_tag('assets/darktemplate/css/slide.css');
        ?>
        <link rel="stylesheet" href="slide.css">
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
                                <h4 class="page-title">Inicio</h4>
                            </div>
                        </div>

                        <br>

                         <div class="col-lg-12">
                            <div class="panel panel-border panel-info">
                              <div class="panel-heading">
                                  <h3 class="panel-title">Estrenos</h3>
                              </div>
                              <div class="galeria">
                                <ul class="slider">
                                    <li id="slide1">
                                    <!-- <iframe width="900" height="506" src="" title="SPIDER MAN SIN CAMINO A CASA Tráiler 2 Español Latino Subtitulado (2021)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                    <img src="<?php echo base_url('assets/myapp/img/img/spider.jpg'); ?>"/>
                                    <br><br><br><br><br><br><br>
                                    </li>
                                    <li id="slide2">
                                    <!-- <iframe width="900" height="506" src="https://www.youtube.com/embed/Y2O4RCdwCGM" title="MORTAL KOMBAT Tráiler Español Latino SUBTITULADO (2021)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                    <img src="<?php echo base_url('assets/myapp/img/img/mortal.jpg'); ?>"/>
                                    <br><br><br><br><br><br><br>
                                    </li>
                                    <li id="slide3">
                                    <!-- <iframe width="900" height="506" src="https://www.youtube.com/embed/FUP3P9_mqvA" title="BATMAN Tráiler Español Latino Subtitulado 2 (Nuevo, 2022)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                    <img src="<?php echo base_url('assets/myapp/img/img/batman.jpg'); ?>"/>
                                    <br><br><br><br><br><br><br>         
                                    </li>
                                    <li id="slide4">
                                    <!-- <iframe width="900" height="506" src="https://www.youtube.com/embed/qehG9dKVDG4" title="JURASSIC WORLD 3 DOMINIO Tráiler Español Latino Subtitulado (2022)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                    <img src="<?php echo base_url('assets/myapp/img/img/jurassic.jpg'); ?>"/>
                                    <br><br><br><br><br><br><br>
                                    </li>
                                    <li id="slide5">
                                    <h1>Estrenos de peliculas!</h1>
                                    <p>Ver películas en línea, desde la comodidad de tu casa, es muy fácil. Regístrate y disfruta de la gran variedad de estrenos que Blockbuster Klic® tiene para ti!</p>
                                    <a href="https://www.youtube.com/">¡Busca los trailers!</a>
                                    </li>
                                </ul>

                                <ul class="menu">
                                    <li>
                                    <a href="#slide1">1</a>
                                    </li>
                                    <li>
                                    <a href="#slide2">2</a>
                                    </li>
                                    <li>
                                    <a href="#slide3">3</a>
                                    </li>
                                    <li>
                                    <a href="#slide4">4</a>
                                    </li>
                                    <li>
                                    <a href="#slide5">5</a>
                                    </li>
                                </ul>
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