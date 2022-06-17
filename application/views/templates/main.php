<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistema de Administracion RNI">
        <meta name="author" content="Daniel Alexis Martinez Sosa">
        
        <link rel="shortcut icon" href="<?php echo base_url('assets/myapp/img/img/block.png'); ?>">

        <title><?= $tabTitle; ?></title>
        <?php
        /* Dependencias comunes para el funcionamiento de toda la aplicación */
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
                <---  CSS THIRDPARTY  --->
           ============================================================== */

        /* ==============================================================
                <---  JS TEMPLATE  --->
           ============================================================== */
            echo script_tag("assets/darktemplate/js/modernizr.min.js");
            echo script_tag("assets/darktemplate/js/jquery.min.js");
            echo script_tag("assets/darktemplate/js/bootstrap.min.js");
            echo script_tag("assets/darktemplate/js/detect.js");
            echo script_tag("assets/darktemplate/js/fastclick.js");
            echo script_tag("assets/darktemplate/js/jquery.slimscroll.js");
            echo script_tag("assets/darktemplate/js/jquery.blockUI.js");
            echo script_tag("assets/darktemplate/js/waves.js");
            echo script_tag("assets/darktemplate/js/wow.min.js");
            echo script_tag("assets/darktemplate/js/jquery.nicescroll.js");
            echo script_tag("assets/darktemplate/js/jquery.scrollTo.min.js");
            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");

        /* ==============================================================
                <---  JS MYAPP  --->
           ============================================================== */
            echo script_tag("assets/myapp/js/MY_Functions.js");

            $this->load->helper('url');
        ?>
        <script type="text/javascript">
            var resizefunc = [];
            var myBase_url = '<?php echo base_url();?>'; 

        </script>
    </head>
    <body class="fixed-left">
        <div class="bg-img-main"></div>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Header -->
            <?php $this->load->view('templates/header'); ?>
            
            <!-- Sidemenu -->
            <?php $this->load->view('templates/sidemenu'); ?>
            
            <!-- Dynamic Page Content -->
            <?php $this->load->view($pagecontent); ?>
            
            <!-- Right Sidebar -->
            <?php $this->load->view('templates/rightsidebar'); ?>
        </div>
        <?php 
            echo script_tag("assets/darktemplate/js/jquery.core.js");  // PIERDE EL SCROLL EN: DASHBOARD -> SECCION "INBOX"
            echo script_tag("assets/darktemplate/plugins/moment/moment.js");
            echo script_tag("assets/darktemplate/js/jquery.app.js"); // PIERDE FUNCIONALIDAD EN: SIDEMENU,  PIERDE FUNCIONALIDAD EN: HEADER -> FULL SCREEN

        ?>

        <noscript>
            <!--<meta http-equiv="Refresh" content="1; url=http://rehabilitacionneurologicaintegral/Admin/index.php/Session/SinJava" />-->
            <meta http-equiv="Refresh" content="1; url=http://localhost:8080/RNI/index.php/Session/SinJava" />
        </noscript>

    </body>
</html>