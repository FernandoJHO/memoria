<!DOCTYPE html>
<html lang="en">

    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Editor</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="lib/ready-theme/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/ready.css">
        <link rel="stylesheet" href="lib/ready-theme/assets/css/demo.css">

        <link rel="stylesheet" href="lib/css/pace-theme-minimal.css">
        <script src="lib/js/pace.min.js" type='text/javascript'></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="lib/codemirror/codemirror.js"></script>
        <script src="lib/js/utils.js"></script>
        <script src="lib/alertify/alertify.min.js"></script>
        <link rel="stylesheet" href="lib/alertify/alertify.min.css">
        <link rel="stylesheet" href="lib/codemirror/codemirror.css">
        <link rel="stylesheet" href="lib/codemirror/theme/monokai.css">
        <script src="lib/codemirror/mode/javascript/javascript.js"></script>
        <script src="lib/codemirror/mode/python/python.js"></script>

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
                            <li class="nav-item">
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
                            <h4 class="page-title">Editor</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><i class="la la-file-code-o"></i> <?php echo $archivo; ?></h4>
                                            <!--<p class="card-category"></p> -->
                                        </div>
                                        <div class="card-body">
                                            <div id="editor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><i class="la la-cogs"></i> Ejecución</h4>
                                            <p class="card-category"></p>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="input">Ingresa parámetros de entrada</label>
                                                <textarea class="form-control" id="input" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="output">Salida del código</label>
                                                <textarea class="form-control" id="output" rows="10" readonly></textarea>
                                            </div>
                                            <div class="card-action">
                                                <button class="btn btn-success" onclick="execute()" style="width:100%;"><i class="la la-cogs"></i> Ejecutar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Parámetros</h4>
                                            <p class="card-category">Ingresa parámetros de entrada</p>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <textarea class="form-control" id="input" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!--<div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Output</h4>
                                            <p class="card-category">Aquí se muestra el resultado de la ejecución del código</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea class="form-control" id="output" rows="5" readonly></textarea>
                                            </div>
                                            <div class="card-action">
                                                <button class="btn btn-success" onclick="execute()" style="width:100%;"><i class="la la-cogs"></i> Ejecutar</button>
                                            </div>
                                        </div>                             
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <span title="Al realizar commit tu código quedará almacenado en el repositorio Github de tu grupo.">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"><i class="la la-github"></i> Commit</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="commitmsj"> Ingresa mensaje para el commit del código </label>
                                                    <input type="text" class="form-control form-control" id="commitmsj">
                                                </div>
                                                <div class="card-action">
                                                    <button class="btn btn-default" onclick="commit()" style="width:100%;"><i class="la la-github"></i> Commit</button>
                                                </div>    
                                            </div>                                    
                                        </div>
                                    </span>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php endif ?>
    </body>

<script type="text/javascript">

    var myCodeMirror = CodeMirror(document.getElementById("editor"), {
      mode:  "python",
      theme: "monokai",
      scrollbarStyle: "null",
      lineNumbers: true
    });
    var codigo = <?php echo json_encode($contenido); ?>;
    myCodeMirror.setValue(codigo);

    function commit(){
        var codigo = myCodeMirror.getValue();
        var mensaje = document.getElementById("commitmsj").value;
        var filename = <?php echo json_encode($archivo); ?>;
        var url = '<?php echo base_url() ?>editor/commit';
        
        
        commitCode(codigo,url,mensaje,filename);
    }

    function execute(){
      var code = myCodeMirror.getValue();
      var input = document.getElementById("input").value;
      //var url = '<?php echo base_url() ?>prueba_controller/ejecutar2';
      //var url2 = '<?php echo base_url() ?>prueba_controller/ejecutar5';
      var url = '<?php echo base_url() ?>editor/jdoodle';
      runCode(url,code,input);
      //myFunction2(url2);
    }

</script>

</html>