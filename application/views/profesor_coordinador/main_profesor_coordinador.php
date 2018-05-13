<!DOCTYPE html>
<html lang="en">
	<head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Home profesor</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/demo.css">

        <script src="lib/ready-theme/assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="lib/ready-theme/assets/js/core/popper.min.js"></script>
        <script src="lib/ready-theme/assets/js/core/bootstrap.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/chartist/chartist.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/chart-circle/circles.min.js"></script>
        <script src="lib/ready-theme/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script src="lib/ready-theme/assets/js/ready.min.js"></script>

	</head>
	<body>
        
        <div class="wrapper">
            <div class="main-header">
                <div class="logo-header">
                    <a href="mainProfesor" class="logo">
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
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="lib/ready-theme/assets/img/user_logo.png" alt="user-img" width="36" class="img-circle"><span ><?php echo $nombre; ?></span></span> </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <div class="user-box">
                                            <div class="u-img"><img src="lib/ready-theme/assets/img/user_logo.png" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $nombre; ?> <?php echo $apellido; ?></h4>
                                                <p class="text-muted"><?php echo $mail; ?></p>
                                            </div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>cuenta/profesor"><i class="ti-settings"></i>Mi cuenta</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout"><i class="fa fa-power-off"></i>Cerrar sesión</a>
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
                                <img src="lib/ready-theme/assets/img/user_logo.png">
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
                                <a href="<?php echo base_url();?>profesores">
                                    <i class="la la-users"></i>
                                    <p>Gestión de profesores</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="editarEntregas">
                                    <i class="la la-suitcase"></i>
                                    <p>Entregas</p>
                                </a>
                            </li> 

                            <li class="nav-item">
                                <a href="miSeccion">
                                    <i class="la la-group"></i>
                                    <p>Mi sección</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="secciones">
                                    <i class="la la-list"></i>
                                    <p>Secciones</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>gestionCopia">
                                    <i class="la la-search"></i>
                                    <p>Gestión de copia</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>rubricas">
                                    <i class="la la-files-o"></i>
                                    <p>Rúbricas</p>
                                </a>
                            </li>                                
                        </ul>
                    </div>
                </div>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <h4 class="page-title">Hola, <?php echo $nombre; ?>.</h4>
                            <div class="row">

                                <div class="col-md-3">
                                    <a href="profesores" style="text-decoration: none">
                                        <div class="card card-stats card-warning">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="icon-big text-center">
                                                            <i class="la la-users"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <h4 class="card-category">Gestión profesores</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> 
                                </div>

                                <div class="col-md-3">
                                    <a href="editarEntregas" style="text-decoration: none">
                                        <div class="card card-stats card-success">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="icon-big text-center">
                                                            <i class="la la-suitcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <h4 class="card-category">Entregas</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> 
                                </div>

                                <div class="col-md-3">
                                    <a href="miSeccion" style="text-decoration: none">
                                        <div class="card card-stats card-primary">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="icon-big text-center">
                                                            <i class="la la-users"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <h4 class="card-category">Mi sección</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> 
                                </div>

                                <div class="col-md-3">
                                    <a href="gestionCopia" style="text-decoration: none">
                                        <div class="card card-stats card-default">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="icon-big text-center">
                                                            <i class="la la-search"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <h4 class="card-category">Gestión de copia</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 


                
	</body>
</html>
