<!DOCTYPE html>
<html lang="en">
	<head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title></title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/demo.css">

        <script src="lib/alertify/alertify.min.js"></script>
        <link rel="stylesheet" href="lib/alertify/alertify.min.css">
        <script src="lib/js/utils.js"></script>

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


        <style>
        .alertify-notifier .ajs-message.ajs-error{
            color: #fff;
            background: rgba(217, 92, 92, 0,95);
            text-shadow: -1px -1px 0 rgba(0, 0, 0, 0,5);
        }
        .alertify-notifier .ajs-message.ajs-success{
            color: #fff;
            background: rgba(217, 92, 92, 0,95);
            text-shadow: -1px -1px 0 rgba(0, 0, 0, 0,5);
        }
        </style>

	</head>
	<body>
        <?php if ($logeado && $rol=='Alumno'): ?> 
        <div class="wrapper">
            <div class="main-header">
                <div class="logo-header">
                    <a href="mainAlumno" class="logo">
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
                                                <p class="text-muted"><?php echo $mail; ?></p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                            </div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i>Configuración</a>
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
                                            <a href="#profile">
                                                <span class="link-collapse">Perfil</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#settings">
                                                <span class="link-collapse">Configuración</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="grupos/miGrupo">
                                    <i class="la la-group"></i>
                                    <p>Mi grupo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="github">
                                    <i class="la la-github"></i>
                                    <p>Github</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="entregas/all">
                                    <i class="la la-suitcase"></i>
                                    <p>Entregas</p>
                                </a>
                            </li>
                            <li class="nav-item active">
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
                            <h4 class="page-title">Archivos del grupo <?php if ($credenciales && $grupo): ?><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#newFileModal"><i class="la la-plus"></i> Nuevo</button><?php endif; ?>  </h4>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <div id="refresh" class="row">
                                <?php if ($credenciales): ?>
                                    <?php if ($grupo): ?>
                                        <?php if (count($archivos)): ?>
                                            <?php foreach($archivos as $archivo): ?>
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <!--<div class="card-header">
                                                            <h2 align="center"><i class="la la-file-code-o"></i></h2>
                                                            <h6 align="center"> <?php echo $archivo ?> </h6>
                                                        </div> -->
                                                        <form id="editForm" method="post" action="<?php echo base_url() ?>editor"></form>
                                                        <!--<form id="deleteForm" method="post" action="<?php echo base_url() ?>codigos/delete_file"></form>-->
                                                        <div class="card-body">
                                                            <h2 align="center"><i class="la la-file-code-o"></i></h2>
                                                            <h6 align="center"> <?php echo $archivo ?> </h6>
                                                            <div class="card-action">
                                                                <button class="btn btn-default " name="filename" form="editForm" value="<?php echo $archivo; ?>" type="submit" style="width:100%;">Editar</button>
                                                                <p></p>
                                                                <button class="btn btn-danger " onclick="delete_file('<?php echo $archivo; ?>')" style="width:100%;">Eliminar</button> 
                                                                <!--<button class="btn btn-danger" name="nombre_archivo" form="deleteForm" value="<?php echo $archivo; ?>" onclick="return confirm('¿Estás seguro que deseas eliminar <?php echo $archivo; ?>?')" type="submit">Eliminar</button>-->
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="col-md-12">
                                                <p class="text-danger" align="center">No cuentas con archivos.</p>
                                            </div>
                                        <?php endif; ?> 
                                    <?php else: ?>
                                        <div class="col-md-12">
                                            <p class="text-danger" align="center">Aún no formas parte de un grupo.</p>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                        <div class="col-md-12">
                                            <p class="text-danger" align="center">No has proporcionado tus credenciales de Github.</p>
                                        </div>                            
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>

        <div class="modal fade" id="newFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="<?php echo base_url() ?>codigos/new_file/">
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Nombre del archivo (sin extensión)</label>
                        <input type="text" class="form-control" id="user" name="nombre_archivo" placeholder="Ej.: nombrearchivo1" required="true">
                    </div>  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear</button>
                  </div>
              </form>
            </div>
          </div>
        </div>

    <?php endif ?>         


	</body>

<script type="text/javascript">

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-success";
alertify.defaults.theme.cancel = "btn btn-danger";

function delete_file(file){
    var archivo = file;
    var url = '<?php echo base_url() ?>codigos/delete_file';

    alertify.set('notifier','position', 'top-right');
    alertify.confirm('Confirma', '¿Estás seguro que deseas eliminar '+archivo.bold()+'?', function(){             
        alertify.success("Eliminando...");
        deleteFile(archivo,url);
        }
        , function(){
        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});


}

</script>

</html>
