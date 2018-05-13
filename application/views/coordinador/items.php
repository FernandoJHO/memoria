<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Items categoría <?php echo $nombre_categoria; ?></title>
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
                                                <p class="text-muted"><?php echo $mail; ?></p>
                                            </div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>cuenta/profesor"><i class="ti-settings"></i>CMi cuenta</a>
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
                            <h4 class="page-title">Items (Categoría: <?php echo $nombre_categoria; ?> | Rúbrica: Entrega <?php echo $numero_entrega; ?>) <a href="<?php echo base_url();?>rubricas/verCategorias/<?php echo $id_rubrica; ?>/<?php echo $numero_entrega; ?>" class="btn btn-primary btn-sm"><i class="la la-arrow-left"></i> Volver a categorías</a></h4>
                            <?php echo $this->session->flashdata('msg_create'); ?>
                            <?php echo $this->session->flashdata('msg_update'); ?>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title"> Crea y edita los items <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#newItemModal"><i class="la la-plus"></i> Nuevo</button></div>
                                            </div>
                                            <div class="card-body">
                                                <?php if(!count($items)): ?>
                                                    <p class="text-danger" align="center"> Aún no se han creado items. </p>
                                                <?php else: ?>
                                                    
                                                    <?php $contador = 1; ?>
                                                    <form method="post" action="<?php echo base_url() ?>rubricas/edit_item/">
                                                        <?php foreach($items as $item): ?>
                                                            
                                                            <div class="form-group">
                                                                <label >Item <?php echo $contador; ?></label>
                                                                <input type="text" class="form-control" name="item_<?php echo $contador; ?>" value="<?php echo $item['item']; ?>"> 
                                                                <P></P>
                                                                <p align="center"><button type="button" class="btn btn-danger btn-sm" onclick="delete_item('<?php echo $item['id']; ?>','<?php echo $contador; ?>');"><i class="la la-close"></i> Eliminar</button></p>
                                                            </div>  
                                                            <input type="hidden" name="id_item_<?php echo $contador; ?>" value="<?php echo $item['id']; ?>">

                                                            <?php $contador++; ?>
                                                        <?php endforeach; ?>
                                                        <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
                                                        <input type="hidden" name="nombre_categoria" value="<?php echo $nombre_categoria; ?>">
                                                        <input type="hidden" name="numero_entrega" value="<?php echo $numero_entrega; ?>">
                                                        <input type="hidden" name="id_rubrica" value="<?php echo $id_rubrica; ?>">
                                                        <div class="card-action">
                                                            <button class="btn btn-success" type="submit">Guardar cambios</button>
                                                            <button class="btn btn-danger" type="reset">Cancelar</button>
                                                        </div>
                                                    </form>
                                                    
                                                <?php endif; ?>  
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>
                    </div>
                </div>
            </div> 
        </div> 

        <div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="<?php echo base_url() ?>rubricas/new_item/">
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Item</label>
                        <input type="text" class="form-control" name="item" required="true">
                    </div> 
                    <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
                    <input type="hidden" name="numero_entrega" value="<?php echo $numero_entrega; ?>">
                    <input type="hidden" name="nombre_categoria" value="<?php echo $nombre_categoria; ?>">
                    <input type="hidden" name="id_rubrica" value="<?php echo $id_rubrica; ?>">
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

function delete_item(iditem,nroitem){

    var url = '<?php echo base_url() ?>rubricas/delete_item/'+iditem;
    alertify.set('notifier','position', 'top-right');

    alertify.confirm('Confirma', '¿Estás seguro que deseas eliminar el item '+nroitem.bold()+ '?', function(){ 
        alertify.success("Eliminando...");
        deleteItem(url);
        }
        , function(){
        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
}

</script>

</html>