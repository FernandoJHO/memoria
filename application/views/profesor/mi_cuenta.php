<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Mi cuenta</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/demo.css">

        <script src="<?php echo base_url();?>lib/alertify/alertify.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>lib/alertify/alertify.min.css">
        <script src="<?php echo base_url();?>lib/js/utils.js"></script>

        <script src="<?php echo base_url();?>lib/codemirror/codemirror.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>lib/codemirror/codemirror.css">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/codemirror/theme/monokai.css">
        <script src="<?php echo base_url();?>lib/codemirror/mode/javascript/javascript.js"></script>
        <script src="<?php echo base_url();?>lib/codemirror/mode/python/python.js"></script>

        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/core/popper.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/core/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/chartist/chartist.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/chart-circle/circles.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?php echo base_url();?>lib/ready-theme/assets/js/ready.min.js"></script>

        <style type="text/css">
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('<?php echo base_url();?>lib/img/loader.gif') 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }
        </style>

        <script type="text/javascript">
            $(window).on("load", function() {
                $(".loader").fadeOut("slow");
            });
        </script>

    </head>
    <body>
        <div class="loader"></div>
        <div class="wrapper">
            <div class="main-header">
                <div class="logo-header">
                    <a href="<?php echo base_url();?>mainProfesor" class="logo">
                        MEMORIA
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
                </div>
                <nav class="navbar navbar-header navbar-expand-lg">
                    <div class="container-fluid">
                        
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="<?php echo base_url();?>lib/ready-theme/assets/img/user_logo.png" alt="user-img" width="36" class="img-circle"><span ><?php echo $nombre; ?></span></span> </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <div class="user-box">
                                            <div class="u-img"><img src="<?php echo base_url();?>lib/ready-theme/assets/img/user_logo.png" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $nombre; ?> <?php echo $apellido; ?></h4>
                                                <p class="text-muted"><?php echo $mail; ?></p>
                                            </div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>cuenta/profesor"><i class="ti-settings"></i>Mi cuenta</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>logout"><i class="fa fa-power-off"></i>Cerrar sesión</a>
                                    </ul>
                                    <!-- /.dropdown-user -->
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="sidebar">
                    <div class="scrollbar-inner sidebar-wrapper">
                        <div class="user">
                            <div class="photo">
                                <img src="<?php echo base_url();?>lib/ready-theme/assets/img/user_logo.png">
                            </div>
                            <div class="info">
                                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        <?php echo $nombre; ?> <?php echo $apellido; ?>
                                        <span class="user-level"><?php echo $rol; ?></span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>

                                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                                    <ul class="nav">
                                        <li>
                                            <a href="<?php echo base_url();?>cuenta/profesor">
                                                <span class="link-collapse">Mi cuenta</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>miSeccion">
                                    <i class="la la-group"></i>
                                    <p>Mi sección</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>gestionCopia">
                                    <i class="la la-search"></i>
                                    <p>Gestión de copia</p>
                                </a>
                            </li>                     
                        </ul>
                    </div>
                </div>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <h4 class="page-title">Mi cuenta</h4>
                            <?php echo $this->session->flashdata('msg'); ?>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Cambiar contraseña</div>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="<?php echo base_url() ?>cuenta/cambiar_password_profesor/">

                                                    <div class="form-group">
                                                        <label>Ingresa tu contraseña actual</label>
                                                        <input type="password" class="form-control" name="actual" required="true">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Ingresa la nueva contraseña</label>
                                                        <input type="password" class="form-control" name="nueva" required="true">
                                                    </div>   

                                                    <div class="form-group">
                                                        <label>Repite la nueva contraseña</label>
                                                        <input type="password" class="form-control" name="nueva_verif" required="true">
                                                    </div>
                                     
                                                    <div class="card-action">
                                                        <button class="btn btn-success" type="submit" >Guardar cambios</button>
                                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            
                        </div>
                    </div>
                </div>
            </div> 
        </div> 


                
    </body>


</html>