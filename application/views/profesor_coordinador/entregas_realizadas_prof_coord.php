<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Entregas Grupo <?php echo $numero_grupo; ?></title>
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

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>

        <script type="text/javascript">

        function generarGrafico(id_container, integrante_commits){

            //alert("flag");

            var container = '#grafico'+id_container;
            var nombres = [];
            var commits = [];
            var datos_finales = [];



            $.each(integrante_commits, function( ){
                $.each(this, function(key,value){
                    if(key=="nombre"){
                        nombres.push(value);
                    }
                    if(key=="commits"){
                        commits.push(parseInt(value));
                    }
                });
            }); 



            for(var i=0; i<nombres.length; i++){
                datos_finales.push({
                    name: nombres[i],
                    y: commits[i]
                });
            }


            $(container).highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Aporte por alumno'
                },
                tooltip: {
                    
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Commits',
                    colorByPoint: true,
                    data: datos_finales
                }]
            });

            

        }

        </script>

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
                            <h4 class="page-title">Entregas del Grupo <?php echo $numero_grupo; ?></h4>

                            <?php if(!count($entregas)): ?>
                                <p class="text-danger" align="center"> El grupo aún no ha realizado entregas. </p>
                            <?php else: ?>
                                <div class="row">
                                <?php foreach($entregas as $entrega): ?>

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" align="center"> Entrega <?php echo $entrega['numero']; ?> </div>
                                                <p align="center"> <b> <?php echo $entrega['descripcion']; ?> </b> </p>
                                            </div>
                                            
                                                
                                            <?php if($entrega['codigofuente']): ?>
                                                <?php if(count($entrega['alumno_commits'])): ?>
                                                <div id="grafico<?php echo $entrega['numero']; ?>" class="card-body">
                                    
                                               
                                                    <script>
                                                        generarGrafico(<?php echo $entrega['numero']; ?>, <?php echo json_encode($entrega['alumno_commits']); ?>);
                                                    </script>

                                                </div>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                                <div class="card-action">
                                                    <a href="<?php echo base_url();?>archivos/ver/<?php echo $entrega['id']; ?>/<?php echo $id_grupo; ?>/<?php echo $entrega['numero']; ?>/<?php echo $numero_grupo; ?>" class="btn btn-default" style="width:100%;"><i class="la la-eye"></i> Ver archivos </a>
                                                    <p></p>
                                                    <a href="<?php echo base_url();?>evaluacion/rubricas/<?php echo $entrega['id']; ?>/<?php echo $entrega['numero']; ?>/<?php echo $id_grupo; ?>/<?php echo $numero_grupo; ?>" class="btn btn-primary" style="width:100%;"><i class="la la-check-circle"></i> Evaluar</a>
                                                </div>
                                            
                                            
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

    </body>




</html>