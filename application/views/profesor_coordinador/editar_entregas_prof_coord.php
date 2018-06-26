<!DOCTYPE html>
<html lang="en">
	<head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Editar entregas</title>
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
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>profesores">
                                    <i class="la la-users"></i>
                                    <p>Gestión de profesores</p>
                                </a>
                            </li> 
                            <li class="nav-item active">
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
                            <h4 class="page-title">Editar entregas <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#newEntregaModal"><i class="la la-plus"></i> Nueva</button></h4>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <div class="row" id="refresh">

                                <?php foreach($entregas as $entrega): ?>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h2 align="center"><i class="la la-suitcase"></i></h2>
                                            </div>
                                            <div class="card-body">
                                                <!--<form method="post" id="deleteForm<?php echo $entrega['id']; ?>" action="<?php echo base_url() ?>editarEntregas/delete_entrega/">
                                                    <input type="hidden" class="form-control" name="id_entrega" value="<?php echo $entrega['id']; ?>">
                                                </form> -->
                                                <form method="post" id="editForm<?php echo $entrega['id']; ?>" action="<?php echo base_url() ?>editarEntregas/set_entrega/">
                                                    <div class="form-group">
                                                        <label for="nombre_entrega">Nombre entrega</label>
                                                        <input type="text" class="form-control" name="nombre_entrega" value="<?php echo $entrega['descripcion']; ?>" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="numero_entrega">N° entrega</label>
                                                        <select class="form-control" name="numero_entrega" required="true">
                                                            <?php for($i=1;$i<=10;$i++): ?>
                                                                <?php if (intval($entrega['numero']) == $i ): ?>
                                                                    <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                <?php endif; ?> 
                                                            <?php endfor; ?>
                                                        </select> 
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha_limite">Fecha límite</label>
                                                        <input type="date" class="form-control" name="fecha_entrega" value="<?php echo $entrega['fecha']; ?>" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="hora_limite">Hora límite</label>
                                                        <input type="time" class="form-control" name="hora_entrega" value="<?php echo $entrega['hora']; ?>" required="true">
                                                    </div>
                                                    <div class="form-check">
                                                        <label>¿Considera entrega de código fuente?</label><br/>
                                                        <label class="form-radio-label">
                                                            <?php if ($entrega['codigofuente']): ?>
                                                                <input class="form-radio-input" type="radio" name="codigo_fuente" value="1" required="true" checked>
                                                            <?php else: ?>
                                                                <input class="form-radio-input" type="radio" name="codigo_fuente" value="1" required="true">
                                                            <?php endif; ?>
                                                            <span class="form-radio-sign">Sí</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <?php if (!$entrega['codigofuente']): ?>
                                                                <input class="form-radio-input" type="radio" name="codigo_fuente" value="0" required="true" checked>
                                                            <?php else: ?>
                                                                <input class="form-radio-input" type="radio" name="codigo_fuente" value="0" required="true">
                                                            <?php endif; ?>
                                                            <span class="form-radio-sign">No</span>
                                                        </label>
                                                    </div>
                                                    <input type="hidden" class="form-control" name="id_entrega" value="<?php echo $entrega['id']; ?>">
                                                </form>
                                                    <div class="card-action">
                                                        <button class="btn btn-success" form="editForm<?php echo $entrega['id']; ?>" type="submit" >Guardar</button>
                                                        <button class="btn btn-warning" form="editForm<?php echo $entrega['id']; ?>" type="reset">Cancelar</button>
                                                        <button class="btn btn-danger" onclick="delete_entrega('<?php echo $entrega['id']; ?>','<?php echo $entrega['numero']; ?>')">Eliminar</button>
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

        <div class="modal fade" id="newEntregaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear entrega</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="<?php echo base_url() ?>editarEntregas/new_entrega/">
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre_entrega">Nombre entrega</label>
                        <input type="text" class="form-control" name="nombre_entrega" required="true">
                    </div>
                    <div class="form-group">
                        <label for="numero_entrega">N° entrega</label>
                        <select class="form-control" name="numero_entrega" placeholder="fd" required="true">
                            <option disabled selected>Selecciona una opción...</option>
                            <?php for($i=1;$i<=10;$i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select> 
                       <!-- <input type="number" class="form-control" name="numero_entrega" min="1" max="10" required="true"> -->
                    </div>
                    <div class="form-group">
                        <label for="fecha_limite">Fecha límite</label>
                        <input type="date" class="form-control" name="fecha_entrega" required="true">
                    </div>
                    <div class="form-group">
                        <label for="hora_limite">Hora límite</label>
                        <input type="time" class="form-control" name="hora_entrega" required="true">
                    </div>
                    <div class="form-check">
                        <label>¿Considera entrega de código fuente?</label><br/>
                        <label class="form-radio-label">
                            
                            
                            <input class="form-radio-input" type="radio" name="codigo_fuente" value="1" >
                            
                            <span class="form-radio-sign">Sí</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            
                            <input class="form-radio-input" type="radio" name="codigo_fuente" value="0" >
                            
                            <span class="form-radio-sign">No</span>
                        </label>
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


                
	</body>

<script type="text/javascript">

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-success";
alertify.defaults.theme.cancel = "btn btn-danger";

function delete_entrega(ent_id,ent_n){
    var entrega = ent_id;
    var numero = ent_n;
    var url = '<?php echo base_url() ?>editarEntregas/delete_entrega';

    alertify.set('notifier','position', 'top-right');

    alertify.confirm('Confirma', '¿Estás seguro que deseas eliminar la entrega '+numero.bold()+ '?', function(){ 
        alertify.success("Eliminando...");
        deleteEntrega(entrega,url);
        }
        , function(){
        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
}

</script>

</html>
