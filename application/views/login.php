<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="lib/logintheme/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/logintheme/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="lib/logintheme/css/form-elements.css">
        <link rel="stylesheet" href="lib/logintheme/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="lib/logintheme/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="lib/logintheme/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="lib/logintheme/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="lib/logintheme/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="lib/logintheme/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>MEMORIA 2018</h1>
                            <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>INGRESO PROFESOR</h3>
	                            		<p>
                                            Ingresa tu correo electrónico y contraseña
                                        </p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">

                                    <?php
                                    $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                                    echo form_open("login_profesor/index", $attributes);?>
				                    <form role="form" action="" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="txt_username">Correo electrónico</label>
				                        	<input type="email" name="txt_username" placeholder="Correo electrónico" id="txt_username" value="<?php echo set_value('txt_username'); ?>" required="true" class="form-username form-control">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="txt_password">Contraseña</label>
				                        	<input class="form-password form-control"  placeholder="Contraseña" type="password" name="txt_password" id="txt_password" value="<?php echo set_value('txt_password'); ?>" required="true">
				                        </div>
                                        <div class="form-group">
                                            <p align="center"><input type="checkbox" name="remember_me_profesor"/> Recordar</p>
                                        </div>
				                        <button id="btn_login" name="btn_login" type="submit" value="Login" class="btn">Ingresar</button>
				                    </form>
                                    <?php echo form_close(); ?>
                                    <div class="row"> <p style="color:white;">.</p> </div>
                                    <?php echo $this->session->flashdata('msg_profesor'); ?>
			                    </div>
		                    </div>
		                
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>INGRESO ALUMNO</h3>
                                        <p>
                                            Ingresa tu correo electrónico y contraseña
                                        </p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <?php
                                    $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                                    echo form_open("login_alumno/index", $attributes);?>

                                    <form role="form" action="" method="post" class="login-form">
                                        <div class="form-group">
                                            <label class="sr-only" for="txt_username">Correo electrónico</label>
                                            <input class="form-username form-control" placeholder="Correo electrónico" type="email" name="txt_username" id="txt_username" value="<?php echo set_value('txt_username'); ?>" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="txt_password">Contraseña</label>
                                            <input class="form-password form-control" type="password" placeholder="Contraseña" name="txt_password" id="txt_password" value="<?php echo set_value('txt_password'); ?>" required="true">
                                        </div>
                                        <div class="form-group">
                                            <p align="center"><input type="checkbox" name="remember_me_alumno"/> Recordar</p>
                                        </div>
                                        <button class="btn" id="btn_login" name="btn_login" type="submit" value="Login">Ingresar</button>
                                    </form>
                                    <?php echo form_close(); ?>
                                    <div class="row"> <p style="color:white;">.</p> </div>
                                    <?php echo $this->session->flashdata('msg_alumno'); ?>
                                </div>
                            </div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="lib/logintheme/js/jquery-1.11.1.min.js"></script>
        <script src="lib/logintheme/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/logintheme/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>