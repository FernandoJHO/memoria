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

        <!--<div class="row" id="editor">
        </div>

        <button onclick="execute()">Execute</button>
        <button onclick="commit()">Commit</button>

        <div class="row">
            <textarea id="input" rows="10" cols="40"></textarea>
        </div>
        <div class="row">
            <textarea id="output" rows="10" cols="60"></textarea>
        </div> -->

        <div class="wrapper">
            <div class="main-header">
                <div class="logo-header">
                    <a href="index.html" class="logo">
                        Ready Dashboard
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
                </div>
                <nav class="navbar navbar-header navbar-expand-lg">
                    <div class="container-fluid">
                        
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-envelope"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-bell"></i>
                                    <span class="notification">3</span>
                                </a>
                                <ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
                                    <li>
                                        <div class="dropdown-title">You have 4 new notification</div>
                                    </li>
                                    <li>
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        New user registered
                                                    </span>
                                                    <span class="time">5 minutes ago</span> 
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span> 
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img"> 
                                                    <img src="assets/img/profile2.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span> 
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Farrah liked Admin
                                                    </span>
                                                    <span class="time">17 minutes ago</span> 
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="lib/ready-theme/assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span >Hizrian</span></span> </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <div class="user-box">
                                            <div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Hizrian</h4>
                                                <p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                            </div>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
                                        <a class="dropdown-item" href="#"></i> My Balance</a>
                                        <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
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
                                <img src="lib/ready-theme/assets/img/profile.jpg">
                            </div>
                            <div class="info">
                                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        Hizrian
                                        <span class="user-level">Administrator</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>

                                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                                    <ul class="nav">
                                        <li>
                                            <a href="#profile">
                                                <span class="link-collapse">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#edit">
                                                <span class="link-collapse">Edit Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#settings">
                                                <span class="link-collapse">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="index.html">
                                    <i class="la la-dashboard"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="components.html">
                                    <i class="la la-table"></i>
                                    <p>Components</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="forms.html">
                                    <i class="la la-keyboard-o"></i>
                                    <p>Forms</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tables.html">
                                    <i class="la la-th"></i>
                                    <p>Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="notifications.html">
                                    <i class="la la-bell"></i>
                                    <p>Notifications</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="typography.html">
                                    <i class="la la-font"></i>
                                    <p>Typography</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="icons.html">
                                    <i class="la la-fonticons"></i>
                                    <p>Icons</p>
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
                                            <h4 class="card-title">Edita tu código</h4>
                                            <p class="card-category">Python 2.7</p>
                                        </div>
                                        <div class="card-body">
                                            <div id="editor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Parámetros</h4>
                                            <p class="card-category">Ingresa parámetros de entrada</p>
                                        </div>
                                        <div class="card-body">
                                            <textarea class="form-control" id="input" rows="5"></textarea>
                                        </div>
                                        <div class="card-action">
                                            <button class="btn btn-success" onclick="execute()">Ejecutar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Mensaje de commit</h4>
                                            <p class="card-category">Ingresa mensaje para el commit del código</p>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" class="form-control form-control" id="commitmsj">
                                        </div>
                                        <div class="card-action">
                                            <button class="btn btn-default" onclick="commit()">Commit</button>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Output</h4>
                                            <p class="card-category">Aquí se muestra el resultado de la ejecución del código</p>
                                        </div>
                                        <div class="card-body">
                                            <textarea class="form-control" id="output" rows="5" readonly></textarea>
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
        var url = '<?php echo base_url() ?>editor/commit';
        
        commitCode(codigo,url,mensaje);
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