<!DOCTYPE html>
<html lang="en">
	<head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Datos Github</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/demo.css">

        <link rel="stylesheet" href="lib/css/pace-theme-minimal.css">
        <script src="lib/js/pace.min.js" type='text/javascript'></script>

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



        <style type="text/css">
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('lib/img/loader.gif') 50% 50% no-repeat rgb(249,249,249);
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
        <?php if ($logeado && $rol=='Alumno'): ?> 
        <div class="wrapper">
            <div class="main-header">
                <div class="logo-header">
                    <a href="mainAlumno" style="text-decoration: none;" class="logo">
                        <img src="<?php echo base_url(); ?>lib/img/usach.png" style="width: 100%; height: 100%; max-width: 155px;">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
                </div>
                <nav class="navbar navbar-header navbar-expand-lg">
                    <div class="container-fluid">
                        
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <!--<li class="nav-item dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-envelope"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li> -->

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
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>cuenta/alumno"><i class="ti-settings"></i>Mi cuenta</a>
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
                                        <span class="user-level">Alumno</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>

                                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                                    <ul class="nav">
                                        <li>
                                            <a href="<?php echo base_url(); ?>cuenta/alumno">
                                                <span class="link-collapse">Mi cuenta</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="miGrupo">
                                    <i class="la la-group"></i>
                                    <p>Mi grupo</p>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="github">
                                    <i class="la la-github"></i>
                                    <p>Github</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="entregas">
                                    <i class="la la-suitcase"></i>
                                    <p>Entregas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="codigos">
                                    <i class="la la-file-code-o"></i>
                                    <p>Códigos fuente</p>
                                </a>
                            </li>    
                        </ul>
                    </div>
                </div>

                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <h4 class="page-title">Datos Github</h4>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Tus datos</div>

                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="<?php echo base_url() ?>github/set_user_data/">

                                                <div class="form-group">
                                                    <label for="email">Tu usuario Github</label>
                                                    <input type="text" class="form-control" id="user" name="usuario" value="<?php echo $github_acc; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Tu contraseña Github</label>
                                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $github_pass; ?>">
                                                </div>
                                                <div class="card-action">
                                                    <button class="btn btn-success" type="submit" >Guardar</button>
                                                    <button class="btn btn-danger" type="reset">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Datos del repositorio </div>
                                            <p class="card-category">IMPORTANTE: El repositorio debe estar en modo <b>público</b></p>
                                        </div>
                                        <div class="card-body">
                                            <?php if ($grupo): ?> 
                                                <form method="post" action="<?php echo base_url() ?>github/set_repo_data/">

                                                    <div class="form-group">
                                                        <label for="email">Nombre repositorio</label>
                                                        <input type="text" class="form-control" id="user" name="repo_name" value="<?php echo $repositorio; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Dueño repositorio (usuario Github)</label>
                                                        <input type="text" class="form-control" id="password" name="repo_owner" value="<?php echo $owner_repo; ?>">
                                                    </div>

                                                    <div class="card-action">
                                                        <button class="btn btn-success" type="submit" >Guardar</button>
                                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                                    </div>
                                                </form>
                                            <?php else: ?>
                                                <p class="text-danger" align="center"> Aún no formas parte de un grupo. </p>
                                            <?php endif ?>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

    <?php endif ?>            
	</body>


</html>
