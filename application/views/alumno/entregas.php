<!DOCTYPE html>
<html lang="en">
	<head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Entregas</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/demo.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>lib/css/pace-theme-minimal.css">
        <script src="<?php echo base_url(); ?>lib/js/pace.min.js" type='text/javascript'></script>

        <script src="<?php echo base_url();?>lib/alertify/alertify.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>lib/alertify/alertify.min.css">
        <script src="<?php echo base_url();?>lib/js/utils.js"></script>

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
        <div class="loader"></div>
        <?php if ($logeado && $rol=='Alumno'): ?> 
        <div class="wrapper">
            <div class="main-header">
                <div class="logo-header">
                    <a href="<?php echo base_url();?>mainAlumno" style="text-decoration: none;" class="logo">
                        <img src="<?php echo base_url(); ?>lib/img/usach.png" style="width: 100%; height: 100%">
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
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>cuenta/alumno"><i class="ti-settings"></i>Mi cuenta</a>
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
                                <a href="<?php echo base_url();?>grupos/miGrupo">
                                    <i class="la la-group"></i>
                                    <p>Mi grupo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>github">
                                    <i class="la la-github"></i>
                                    <p>Github</p>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="<?php echo base_url();?>entregas/all">
                                    <i class="la la-suitcase"></i>
                                    <p>Entregas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>codigos">
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
                            <h4 class="page-title">Entregas</h4>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <div class="row" id="refresh">

                                <?php if ($grupo): ?>
                                    <?php foreach($entregas as $entrega): ?>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h2 align="center"><i class="la la-suitcase"></i></h2>
                                                    <h6 align="center"><?php echo $entrega['descripcion']; ?> </h6>
                                                </div>  
                                                <div class="card-body">
                                                    <p align="center"> Fecha límite de entrega: <?php echo $entrega['fecha']['dia']; ?>/<?php echo $entrega['fecha']['mes']; ?>/<?php echo $entrega['fecha']['año']; ?> </p>
                                                    <p align="center"> Hora límite de entrega: <?php echo $entrega['hora']['horas']; ?>:<?php echo $entrega['hora']['minutos']; ?> </p>

                                                    <?php echo form_open_multipart(base_url().'entregas/upload_file');?>
                                                        <div class="form-group">
                                                            <label> Selecciona tu presentación o informe a entregar (Tamaño máximo: 10MB. Sólo archivos PDF o ZIP) </label>
                                                            
                                                            <input type="file" id="userfile" name="userfile<?php echo $entrega['numero']; ?>" size="20" required="true" />
                                                           
                                                            
                                                            <input type="hidden" class="form-control" name="numero_entrega" value="<?php echo $entrega['numero']; ?>">
                                                            <input type="hidden" class="form-control" name="id_entrega" value="<?php echo $entrega['id']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                        <?php if ($entrega['archivo_entregado'] || $entrega['activa']==FALSE): ?>
                                                            <button type="submit" class="btn btn-primary" style="width:100%;" disabled><i class="la la-upload"></i> Subir archivo </button>
                                                        <?php else: ?>
                                                            <p align="center">Quedan <?php echo $entrega['restante']; ?> </p>
                                                            <button type="submit" class="btn btn-primary" style="width:100%;"><i class="la la-upload"></i> Subir archivo </button>
                                                        <?php endif; ?> 
                                                        </div>

                                                    </form>
                                                    <?php if ($entrega['codigofuente']): ?>
                                                    <div class="form-group">
                                                        <!--<form method="post"  action="<?php echo base_url() ?>entregas/entregar_codigo/"> -->
                                                            <!--<input type="hidden" class="form-control" id="entrega" name="numero_entrega" value="<?php echo $entrega['numero']; ?>">
                                                            <input type="hidden" class="form-control" id="identrega" name="id_entrega" value="<?php echo $entrega['id']; ?>"> -->
                                                            <?php if ($entrega['codigo_entregado'] || $entrega['activa']==FALSE): ?>
                                                                <!--<button type="submit" class="btn btn-default" style="width:100%;" disabled><i class="la la-check"></i> Entregar</button> -->
                                                                <button class="btn btn-default" style="width:100%;" disabled><i class="la la-check"></i> Entregar código</button> 
                                                            <?php else: ?>
                                                                <!--<button type="submit" class="btn btn-default" style="width:100%;"><i class="la la-check"></i> Entregar</button>-->
                                                                <button class="btn btn-default" onclick="entregar('<?php echo $entrega['numero']; ?>','<?php echo $entrega['id']; ?>')" style="width:100%;"><i class="la la-check"></i> Entregar código</button> 
                                                            <?php endif; ?> 
                                                            
                                                       <!-- </form> -->
                                                    </div>
                                                    <?php endif; ?> 
                                            
                                                </div>                          
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-md-12">
                                        <p class="text-danger" align="center">Aún no formas parte de un grupo.</p>
                                    </div>
                                <?php endif; ?>
                                                        
                            </div> 
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif ?>         


	</body>

<script type="text/javascript">

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-success";
alertify.defaults.theme.cancel = "btn btn-danger";

function entregar(n_entrega,id_entrega){
    var url = '<?php echo base_url() ?>entregas/entregar_codigo/';
    var url_file = '<?php echo base_url() ?>entregas/upload_other_file/';
    var id_input = "userfile"+n_entrega;

    alertify.set('notifier','position', 'top-right');
    alertify.confirm('Confirma', '¿Estás seguro que deseas realizar la entrega del código fuente?', function(){             
        alertify.success("Entregando código fuente...");
        realizarEntrega(n_entrega,id_entrega,url);
        //uploadFile(id_input,url_file,n_entrega);
        }
        , function(){
        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
}

</script>

</html>
