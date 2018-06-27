<!DOCTYPE html>
<html lang="en">
	<head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Profesores</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/demo.css">

        <script src="<?php echo base_url();?>lib/alertify/alertify.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>lib/alertify/alertify.min.css">
        <script src="<?php echo base_url();?>lib/js/utils.js"></script>

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

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


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

              $(document).ready(function(){
                 $('#tabla_profesores').DataTable({
                  "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                  }
                 });
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
                            <li class="nav-item active">
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
                                <a href="secciones">
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
                            <h4 class="page-title">Profesores <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#newProfesorModal"><i class="la la-plus"></i> Nuevo</button></h4>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card card-tasks">
                                        <div class="card-header">
                                            <h4 class="card-title">Lista de profesores</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="refresh" class="table-full-width">
                                                <table id="tabla_profesores" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre </th>
                                                            <th>Apellido </th>
                                                            <th>Correo electrónico </th>
                                                            <th>Secciones </th>
                                                            <th>Coordinador </th>
                                                            <th>Profesor-Coordinador </th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($profesores as $profesor): ?>
                                                            <tr>
                                                                <td><?php echo $profesor['nombres']?></td>
                                                                <td><?php echo $profesor['apellidos']?></td>
                                                                <td><?php echo $profesor['mail']?></td>
                                                                <td>

                                                                    <?php foreach($profesor['secciones'] as $seccion): ?>
                                                                        <?php echo $seccion['codigo']; ?> |
                                                                    <?php endforeach; ?>

                                                                </td>
                                                                <td>
                                                                    <?php if($profesor['coordinador']): ?>
                                                                        Sí <i class="la la-check"></i>
                                                                    <?php else: ?>
                                                                        No <i class="la la-times"></i>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($profesor['profesor_coordinador']): ?>
                                                                        Sí <i class="la la-check"></i>
                                                                    <?php else: ?>
                                                                        No <i class="la la-times"></i>
                                                                    <?php endif; ?>                   
                                                                </td>
                                                                <td class="td-actions text-right"> 
                                                                    <div class="form-button-action">
                                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Eliminar" onclick="delete_profesor('<?php echo $profesor['mail']?>','<?php echo $profesor['nombres']?>','<?php echo $profesor['apellidos']?>');">
                                                                            <i class="la la-remove"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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

        <div class="modal fade" id="newProfesorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="<?php echo base_url() ?>profesores/new_profesor/">
                  <div id="container_form" class="modal-body">
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombres" required="true">
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required="true">
                    </div>
                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" class="form-control" name="mail" required="true">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password" required="true">
                    </div>
                    <div class="form-check">
                        <label>Seleccione rol</label><br/>
                        <label class="form-radio-label">
                            
                            
                            <input class="form-radio-input" type="radio" name="rol" value="1" >
                            
                            <span class="form-radio-sign">Profesor</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            
                            <input class="form-radio-input" type="radio" name="rol" value="2" >
                            
                            <span class="form-radio-sign">Coordinador</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            
                            <input class="form-radio-input" type="radio" name="rol" value="3" >
                            
                            <span class="form-radio-sign">Profesor-Coordinador</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="seccion">Seccion</label>
                        <select class="form-control" name="seccion_1">
                            <option value="" disabled selected>Selecciona una sección...</option>
                            <?php foreach($secciones_all as $seccion): ?>
                                <option value="<?php echo $seccion['id']; ?>" ><?php echo $seccion['codigo']; ?></option>
                            <?php endforeach; ?> 
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                   <p align="center"> <button type="button" onClick="add_dropdown_secciones();" class="btn btn-success btn-xs"><i class="la la-plus"></i> Seccion</button> </p>
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
    function delete_profesor(mail,nombre,apellido){
        var url = '<?php echo base_url() ?>profesores/delete_profesor/';
        alertify.set('notifier','position', 'top-right');
        alertify.confirm('Confirma', '¿Estás seguro que deseas eliminar al profesor '+nombre.bold()+ ' '+ apellido.bold()+ '?', function(){ 
            alertify.success("Eliminando...");
            deleteProfesor(mail,url);
            }
            , function(){
            }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
    }
    
    var aux = 2;

    /* function add_dropdown_secciones(){

        var url = '<?php echo base_url() ?>profesores/get_secciones_json';

        addDropdownSecciones(url);


    }

    function add_dropdown_secciones_success(result){

        var contador = aux;

        var html = '<div class="form-group"> <label >Seccion</label> <select class="form-control" name="seccion_'+contador+'"> <option disabled selected>Selecciona una sección...</option> ';

        for(i in result){
            html = html+'<option value="'+result[i].id+'">'+result[i].codigo+'</option>';
        }

        html = html+'</select> </div>';

        $("#container_form").append(html);

        aux++;
    } */

    function add_dropdown_secciones(){

        var contador = aux;

        var secciones = <?php echo json_encode($secciones_all); ?>;

        var html = '<div class="form-group"> <label >Seccion</label> <select class="form-control" name="seccion_'+contador+'"> <option disabled selected>Selecciona una sección...</option> ';

        for(i in secciones){
            html = html+'<option value="'+secciones[i].id+'">'+secciones[i].codigo+'</option>';
        }

        html = html+'</select> </div>';

        $("#container_form").append(html);

        aux++;

    }

    /*function add_dropdown(){
        var contador = aux;
        var url = '<?php echo base_url() ?>profesores/dropdown_html_builder/'+contador;
        addDropdownSecciones(url);
        aux++;
    }*/

</script>

</html>
