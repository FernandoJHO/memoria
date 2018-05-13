<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Archivos Entrega <?php echo $numero_entrega; ?></title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/demo.css">

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

    </head>
    <body>
        
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
                            <li class="nav-item ">
                                <a href="<?php echo base_url();?>profesores">
                                    <i class="la la-users"></i>
                                    <p>Gestión de profesores</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>editarEntregas">
                                    <i class="la la-suitcase"></i>
                                    <p>Entregas</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>secciones">
                                    <i class="la la-list"></i>
                                    <p>Secciones</p>
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
                            <h4 class="page-title">Archivos de la Entrega <?php echo $numero_entrega; ?>
                                <form method="post" action="<?php echo base_url();?>archivos/download_all">
                                     <input type="hidden" name="identrega" value="<?php echo $id_entrega; ?>">
                                     <input type="hidden" name="idgrupo" value="<?php echo $id_grupo; ?>">
                                     <input type="hidden" name="entrega" value="<?php echo $numero_entrega; ?>">
                                     <input type="hidden" name="grupo" value="<?php echo $numero_grupo; ?>">
                                     <button type="submit" class="btn btn-primary btn-sm" ><i class="la la-download"></i> Descargar todos</button>
                                </form>
                            </h4>


                                <div class="row">
                                <?php foreach($codigosfuente as $codigofuente): ?>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2 align="center"><i class="la la-file-code-o"></i></h2> <h6 align="center">  <?php echo $codigofuente['nombre']; ?>  </h6>

                                                <div class="card-action">
                                                    <form method="post" action="<?php echo base_url();?>archivos/download">

                                                        <input type="hidden" name="ruta" value="<?php echo $codigofuente['ruta']; ?>">
                                                        <button type="submit" class="btn btn-default" style="width:100%;"><i class="la la-download"></i> Descargar</button>

                                                    </form>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                                <?php foreach($archivos as $archivo): ?>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2 align="center"><i class="la la-file"></i></h2> <h6 align="center">  <?php echo $archivo['nombre']; ?>  </h6>

                                                <div class="card-action">

                                                    <form method="post" action="<?php echo base_url();?>archivos/download">

                                                        <input type="hidden" name="ruta" value="<?php echo $archivo['ruta']; ?>">
                                                        <button type="submit" class="btn btn-default" style="width:100%;"><i class="la la-download"></i> Descargar</button>

                                                    </form>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                                </div>

                        </div>
                    </div>
                </div>
            </div> 
        </div> 

                
    </body>
</html>