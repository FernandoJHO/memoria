<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Grupos</title>
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
                        <div id="refresh" class="container-fluid">
                            <h4 class="page-title">Grupos de la sección <?php echo $codigo_seccion; ?> <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#newGroupModal"><i class="la la-plus"></i> Crear</button></h4>
                            <?php echo $this->session->flashdata('msg_mails'); ?>
                            <?php echo $this->session->flashdata('msg_grupo'); ?>
                            <?php echo $this->session->flashdata('msg_grupo_edit_nro'); ?>
                            <?php echo $this->session->flashdata('msg_grupo_edit_integrante'); ?>
                            <?php if(!count($grupos)): ?>
                                <p class="text-danger" align="center"> La sección aún no cuenta con grupos formados para el actual semestre. </p>
                            <?php else: ?>

                                <div class="row">
                                <?php foreach($grupos as $grupo): ?>

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" align="center">Grupo <?php echo $grupo['numero']; ?></div>
                                                <p align="center"><button type="button" data-toggle="modal" data-target="#GroupModal<?php echo $grupo['id']; ?>" title="Modificar grupo" class="btn btn-link <btn-simple-primary" ><i class="la la-edit"></i></button><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar grupo" onclick="delete_grupo('<?php echo $grupo['id']; ?>','<?php echo $grupo['numero']; ?>');"><i class="la la-remove"></i></button></p>

                                            </div>
                                            <div class="card-body">
                                                <p align="center"> <b>Integrantes</b></p>
                                                <?php foreach($grupo['integrantes'] as $integrante): ?>
                                                    <p align="center"> <?php echo $integrante['nombre']; ?> (<?php echo $integrante['mail']; ?>) </p>
                                                <?php endforeach; ?>
                                                
                                                <div class="card-action">
                                                    <a href="<?php echo base_url();?>entregas/verEntregas/<?php echo $grupo['id']; ?>/<?php echo $grupo['numero']; ?>/<?php echo $seccion; ?>/<?php echo $codigo_seccion; ?>" class="btn btn-default" style="width:100%;"><i class="la la-eye"></i> Ver entregas</a>
                                                    <p></p>
                                                    <?php if($grupo['proyecto']!=NULL): ?>
                                                        <a href="<?php echo base_url();?><?php echo $grupo['proyecto']; ?>" class="btn btn-primary" target="_blank" style="width:100%;"><i class="la la-eye"></i> Ver proyecto</a>
                                                        <p></p>
                                                    <?php endif; ?>
                                                    
                                                    <a href="<?php echo base_url();?>codigos/ver/<?php echo $grupo['id']; ?>/<?php echo $grupo['numero']; ?>" class="btn btn-default" style="width:100%;"><i class="la la-eye"></i> Ver códigos</a>
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
            </div> 
        </div> 

        <?php foreach($grupos as $grupo): ?>

            <div class="modal fade" id="GroupModal<?php echo $grupo['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar Grupo <?php echo $grupo['numero']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?php echo base_url() ?>grupos/edit_grupo/">
                      <div id="container_form_<?php echo $grupo['id']; ?>"class="modal-body">
     
                        <div class="form-group">
                            <label for="numero_grupo">Número grupo</label>
                            <select class="form-control" name="numero_grupo" required="true">
                                <?php for($i=0;$i<=20;$i++): ?>
                                    <?php if($i==$grupo['numero']): ?>
                                        <option value="<?php echo $grupo['numero']; ?>" selected><?php echo $grupo['numero']; ?></option>
                                    <?php else: ?> 
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>Integrantes</label>
                            <?php foreach($grupo['integrantes'] as $integrante): ?>
                                <p align="center"> <?php echo $integrante['nombre']; ?> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar"><i class="la la-remove" onclick="delete_integrante('<?php echo $grupo['id']; ?>','<?php echo $integrante['mail']; ?>','<?php echo $integrante['nombre']; ?>');"></i></button></p>
                            <?php endforeach; ?>
                        </div>  
                   
                      </div> 

                      <input type="hidden" class="form-control" name="id_seccion" value="<?php echo $seccion; ?>">
                      <input type="hidden" class="form-control" name="codigo_seccion" value="<?php echo $codigo_seccion; ?>">
                      <input type="hidden" class="form-control" name="id_grupo" value="<?php echo $grupo['id']; ?>">

                      <div class="form-group">
                       <p align="center"> <button type="button" onClick="add_dropdown2('<?php echo $seccion;?>','<?php echo $grupo['id']; ?>');" class="btn btn-success btn-xs"><i class="la la-plus"></i> Integrante</button> </p>
                      </div>  
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                      </div>
                  </form>
                  
                </div>
              </div>
            </div>

        <?php endforeach; ?>

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
                  <input type="hidden" class="form-control" name="codigo_seccion" value="<?php echo $codigo_seccion; ?>">
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

function delete_integrante(idgrupo,mail,nombre){

    var url = '<?php echo base_url() ?>grupos/delete_integrante';

    alertify.set('notifier','position', 'top-right');

    alertify.confirm('Confirma', '¿Estás seguro que deseas eliminar a '+nombre.bold()+ '?', function(){ 
        alertify.success("Eliminando...");
        deleteIntegrante(mail,idgrupo,url);
        }
        , function(){
        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});

} 

var aux = 2;

function add_dropdown(id_seccion){
    var url = '<?php echo base_url() ?>grupos/get_alumnos_json/'+id_seccion;

    addDropdown(url);
}

function add_dropdown_success(result){
    var contador = aux;

    var html = '<div class="form-group"> <label >Integrante</label> <select class="form-control" name="integrante_'+contador+'"> <option disabled selected>Selecciona un integrante...</option> ';

    for(i in result){
        html = html+'<option value="'+result[i].mail+'">'+result[i].nombre+' ('+result[i].mail+')</option>';
    } 

    html = html+'</select> </div>';

    $("#container_form").append(html); 

    aux++;

}

/*function add_dropdown(id_seccion){

    var contador = aux;
    var url = '<?php echo base_url() ?>grupos/dropdown_html_builder/'+contador+'/'+id_seccion;

    addDropdown(url);

    aux++;

} */

var aux2 = 1;
var idgrupo;

function add_dropdown2(id_seccion,id_grupo){

    var url = '<?php echo base_url() ?>grupos/get_alumnos_json/'+id_seccion;

    idgrupo = id_grupo;

    addDropdown2(url);

}

function add_dropdown2_success(result){

    var contador = aux2;

    var html = '<div class="form-group"> <label >Integrante</label> <select class="form-control" name="integrante_'+contador+'"> <option disabled selected>Selecciona un integrante...</option> ';

    for(i in result){
        html = html+'<option value="'+result[i].mail+'">'+result[i].nombre+' ('+result[i].mail+')</option>';
    } 

    html = html+'</select> </div>';

    $("#container_form_"+idgrupo).append(html);

    aux2++;

}

/*function add_dropdown2(id_seccion,id_grupo){

    var contador = aux2;

    var url = '<?php echo base_url() ?>grupos/dropdown_html_builder/'+contador+'/'+id_seccion;

    addDropdown2(url,id_grupo);

    aux2++;

}*/

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