<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title></title>
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
                                                <p class="text-muted"><?php echo $mail; ?></p><a href="#" class="btn btn-rounded btn-danger btn-sm">Ver perfil</a></div>
                                            </div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i>Configuración</a>
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
                        <div id="refresh" class="container-fluid">
                            <h4 class="page-title">Grupos <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#newGroupModal"><i class="la la-plus"></i> Crear</button></h4>
                            <?php echo $this->session->flashdata('msg_mails'); ?>
                            <?php echo $this->session->flashdata('msg_grupo'); ?>
                            <?php if(!count($grupos)): ?>
                                <p class="text-danger" align="center"> La sección aún no cuenta con grupos formados para el actual semestre. </p>
                            <?php else: ?>

                                <div class="row">
                                <?php foreach($grupos as $grupo): ?>

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" align="center"> Grupo <?php echo $grupo['numero']; ?>  </div>
                                            </div>
                                            <div class="card-body">
                                                <p align="center"> <b>Integrantes</b></p>
                                                <?php foreach($grupo['integrantes'] as $integrante): ?>
                                                    <p align="center"> <?php echo $integrante; ?> </p>
                                                <?php endforeach; ?>
                                                
                                                <div class="card-action">
                                                    <a href="<?php echo base_url();?>entregas/verEntregas/<?php echo $grupo['id']; ?>/<?php echo $grupo['numero']; ?>" class="btn btn-default" ><i class="la la-eye"></i> Ver entregas</a>
                                                    
                                                    <?php if($grupo['proyecto']!=NULL): ?>
                                                        <a href="<?php echo base_url();?><?php echo $grupo['proyecto']; ?>" class="btn btn-primary" target="_blank"><i class="la la-eye"></i> Ver proyecto</a>
                                                    <?php endif; ?>
                                                    
                                                    <a href="<?php echo base_url();?>codigos/ver/<?php echo $grupo['id']; ?>/<?php echo $grupo['numero']; ?>" class="btn btn-default" ><i class="la la-eye"></i> Ver códigos</a>

                                                    <button class="btn btn-danger" onclick="delete_grupo('<?php echo $grupo['id']; ?>','<?php echo $grupo['numero']; ?>')"><i class="la la-close"></i> Eliminar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                                </div>
                                
                            <?php endif; ?> 

                        </div>
                    </div>
                </div>

        <div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear grupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="<?php echo base_url() ?>grupos/new_grupo/">
                  <div id="container_form" class="modal-body">
 
                    <div class="form-group">
                        <label for="numero_grupo">Número grupo</label>
                        <select class="form-control" name="numero_grupo" required="true">
                            <option disabled selected>Selecciona un número...</option>
                            <?php for($i=1;$i<=20;$i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label >Integrante</label>
                        <select class="form-control" name="integrante_1" required="true">
                            <option disabled selected>Selecciona un integrante...</option>
                            <?php foreach($alumnos as $alumno): ?>
                                <option value="<?php echo $alumno['mail']; ?>"><?php echo $alumno['nombre']; ?> (<?php echo $alumno['mail']; ?>)</option>
                            <?php endforeach; ?>
                        </select> 
                    </div>  
               
                  </div> 
                  <input type="hidden" class="form-control" name="id_seccion" value="<?php echo $seccion; ?>">
                  <!--<div class="form-group">
                   <p align="center"> <button type="button" id="addfieldbtn" class="btn btn-success btn-xs"><i class="la la-plus"></i> Integrante</button> </p>
                  </div>   -->
                  <div class="form-group">
                   <p align="center"> <button type="button" onClick="add_dropdown('<?php echo $seccion;?>');" class="btn btn-success btn-xs"><i class="la la-plus"></i> Integrante</button> </p>
                  </div>   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear</button>
                  </div>
              </form>
              
            </div>
          </div>
        </div>

                
    </body>

<script type="text/javascript">

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-success";
alertify.defaults.theme.cancel = "btn btn-danger";

function delete_grupo(idgrupo,ngrupo){
    var url = '<?php echo base_url() ?>grupos/delete_grupo';

    alertify.set('notifier','position', 'top-right');

    alertify.confirm('Confirma', '¿Estás seguro que deseas eliminar el grupo '+ngrupo.bold()+ '?', function(){ 
        alertify.success("Eliminando...");
        deleteGrupo(idgrupo,url);
        }
        , function(){
        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
}

var aux = 2;

function add_dropdown(id_seccion){

    var contador = aux;
    var url = '<?php echo base_url() ?>grupos/dropdown_html_builder/'+contador+'/'+id_seccion;

    addDropdown(url);

    aux++;

}

/*$(document).ready(function() {
    var wrapper = $("#container_form");
    var add_button = $("#addfieldbtn");

    var nombre = 'nombre';
    var mail = 'mail';

    $(add_button).click(function(e){
        $(wrapper).append('<div class="form-group"> <label >Integrante</label> <input type="email" class="form-control" name="integrante_'+aux+'"> </div>');
        aux++;
    });
}); */

</script>

</html>