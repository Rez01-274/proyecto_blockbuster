<script type="text/javascript">

    $(document).ready(function() {
        var tiempo = setTimeout(LogOut,900000);
        CheckUActivo();
        document.addEventListener("click", function() {
            clearTimeout(tiempo);
            tiempo = setTimeout(LogOut, 900000);
        })
    });
</script>

<body class="fixed-left"  >
    <div class="bg-img-main"></div>
    <div id="wrapper"><!-- Begin page -->
        <div class="topbar"><!-- Top Bar Start -->
            <div class="topbar-left" ><!-- LOGO -->
                        <div class="text-center">

                            <a href="#" class="logo"><img src="<?php echo base_url('assets/myapp/img/img/login.png'); ?>" alt="user-img" class="img-circle" height="35px"></a>

                        </div>
                    </div>


            <div class="navbar navbar-default" role="navigation"><!-- Button mobile view to collapse sidebar menu -->
                <div class="container">
                    <!--div class=""-->
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="ion-navicon"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                      <div class="topbar-left" ><!-- LOGO -->
                        <div class="text-center">

                            <!--<a href="#" class="logo hidden-xs"><img src="<?php echo base_url('assets/myapp/img/icon.png'); ?>" alt="logo..." height="55px" width="150px"></a>-->

                        </div>
                    </div>

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="hidden-xs hidden-sm hidden-md">

                        </li>
                        <li class="hidden-xs hidden-sm">
                            <a href="#" class="waves-effect"><b><i><?php print_r($this->session->userdata('name')); ?></i></b></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect"><i class="icon-size-fullscreen"></i></a>
                        </li>

                        <li id="campana">

                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light hidden-xs" data-toggle="dropdown" aria-expanded="true">
                                <i class="icon-bell"></i> <span class="badge badge-xs badge-danger" id="not" ></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg" id="info">
                                <li class="notifi-title"><span class="label label-default pull-right" id="not1"></span>Notificationes</li>


                            </ul>
                        </li>

                        <li class="dropdown" id="todo1">
                            <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url('assets/darktemplate/images/users/avatar.jpg'); ?>" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">

                                <li ><a href="<?php echo base_url('index.php/Session/logout'); ?>"><i class="ti-power-off m-r-5"></i> Cerrar sesi&oacute;n</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--/div-->
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div><!-- Top Bar End -->
    </div>

</body>
