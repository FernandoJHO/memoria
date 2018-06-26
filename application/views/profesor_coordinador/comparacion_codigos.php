<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Comparación de códigos</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/ready-theme/assets/css/demo.css">

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
                                <a href="<?php echo base_url();?>miSeccion">
                                    <i class="la la-group"></i>
                                    <p>Mi sección</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>secciones">
                                    <i class="la la-list"></i>
                                    <p>Secciones</p>
                                </a>
                            </li>
                            <li class="nav-item active">
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
                            <h4 class="page-title">Comparación de códigos</h4>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Entre grupos de mi sección</div>
                                            </div>
                                            <div class="card-body">
                                                
                                                <div class="form-group">
                                                    <label for="seccion">Elige tu sección</label>
                                                    <select class="form-control" id="seccion" name="seccion" required="true">
                                                        <?php foreach($secciones_profesor as $seccion): ?>
                                                            <option value="<?php echo $seccion['id']; ?>" ><?php echo $seccion['codigo']; ?></option>
                                                        <?php endforeach; ?>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="entrega">Elige una entrega</label>
                                                    <select class="form-control" id="entrega" name="entrega" required="true">
                                                        <option value="" disabled selected>Selecciona una opción...</option>
                                                        <?php foreach($entregas as $entrega): ?>
                                                            <option value="<?php echo $entrega['id']; ?>" ><?php echo $entrega['numero']; ?>: <?php echo $entrega['nombre']; ?></option>
                                                        <?php endforeach; ?>

                                                    </select>
                                                </div>
                                                
                                                <div class="card-action">
                                                    <button class="btn btn-default" type="button" onClick="compararMiSeccion();" style="width:100%;"><i class="la la-search"></i> Comparar códigos</button>
                                                    <div id="resultado_miseccion">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Entre grupos de mi sección y los de otra sección</div>
                                            </div>
                                            <div class="card-body">
                                                
                                                <div class="form-group">
                                                    <label for="seccion">Elige tu sección</label>
                                                    <select class="form-control" id="seccion_b" name="seccion_b" required="true">
                                                        <?php foreach($secciones_profesor as $seccion): ?>
                                                            <option value="<?php echo $seccion['id']; ?>" ><?php echo $seccion['codigo']; ?></option>
                                                        <?php endforeach; ?>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="seccion">Elige la otra sección</label>
                                                    <select class="form-control" id="seccion_all" name="seccion_all" required="true">
                                                        <option value="" disabled selected>Selecciona una opción...</option>
                                                        <?php foreach($secciones_all as $seccion): ?>
                                                            <option value="<?php echo $seccion['id']; ?>" ><?php echo $seccion['codigo']; ?></option>
                                                        <?php endforeach; ?>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="entrega">Elige una entrega</label>
                                                    <select class="form-control" id="entrega_b" name="entrega_b" required="true">
                                                        <option value="" disabled selected>Selecciona una opción...</option>
                                                        <?php foreach($entregas as $entrega): ?>
                                                            <option value="<?php echo $entrega['id']; ?>" ><?php echo $entrega['numero']; ?>: <?php echo $entrega['nombre']; ?></option>
                                                        <?php endforeach; ?>

                                                    </select>
                                                </div>
                                                
                                                <div class="card-action">
                                                    <button class="btn btn-default" type="button" onClick="compararSecciones();" style="width:100%;"><i class="la la-search"></i> Comparar códigos</button>
                                                    <div id="resultado_secciones">
                                                    </div>
                                                </div>
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

<script type="text/javascript">

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-success";
alertify.defaults.theme.cancel = "btn btn-danger";

function compararMiSeccion(){   


    var seccion = document.getElementById("seccion").value;
    var entrega = document.getElementById("entrega").value;

    alertify.set('notifier','position', 'top-center');
    
    if(seccion=="" || entrega==""){
        alertify.error("Debes indicar sección y entrega");
    }
    else{
        var url = '<?php echo base_url() ?>gestionCopia/comparar_codigos_seccion/'+seccion+'/'+entrega;
        compareCodeMiSeccion(url);
    }

}

function compararSecciones(){
    var seccion1 = document.getElementById("seccion_b").value;
    var seccion2 = document.getElementById("seccion_all").value;
    var entrega = document.getElementById("entrega_b").value;

    alertify.set('notifier','position', 'top-center');

    if(seccion1=="" || seccion2=="" || entrega==""){
        alertify.error("Debes indicar secciones y entrega");
    }
    else{
        var url = '<?php echo base_url() ?>gestionCopia/comparar_codigos_secciones/'+seccion1+'/'+seccion2+'/'+entrega;
        compareCodeSecciones(url);
    }
}

</script>

</html>