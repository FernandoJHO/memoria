<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recuperar clave</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/logintheme/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/logintheme/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>lib/logintheme/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url();?>lib/logintheme/css/style.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>lib/css/pace-theme-minimal.css">
        <script src="<?php echo base_url(); ?>lib/js/pace.min.js" type='text/javascript'></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url();?>lib/ready-theme/assets/img/favicon.ico"> 
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>lib/logintheme/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>lib/logintheme/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>lib/logintheme/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>lib/logintheme/ico/apple-touch-icon-57-precomposed.png">

        <script src="<?php echo base_url(); ?>lib/ready-theme/assets/js/core/jquery.3.2.1.min.js"></script>

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

    </head>

    <body>
        <div class="loader"></div>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    
                    <div class="row">
                        <div class="col-sm-12">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>DATOS GITHUB</h3>
	                            		<p>
                                            Ingresa tu correo y datos Github para validar que eres tú
                                        </p>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">

				                    <form action="<?php echo base_url();?>recuperarClave/validar_datos_alumno" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only">Correo electrónico</label>
				                        	<input type="email" name="mail" placeholder="Correo electrónico" required="true" class="form-username form-control">
				                        </div>
                                        <div class="form-group">
                                            <label class="sr-only">Usuario Github</label>
                                            <input type="text" name="cuenta_github" placeholder="Usuario Github" required="true" class="form-username form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only">Contraseña Github</label>
                                            <input type="password" name="password_github" placeholder="Contraseña Github" required="true" class="form-username form-control">
                                        </div>
				                        <button type="submit" class="btn">Enviar</button>
				                    </form>
                                    <div class="row"> <p style="color:white;">.</p> </div>
                                    <?php echo $this->session->flashdata('msg'); ?>
			                    </div>
		                    </div>
		                
	                        
                        </div>

                    </div>
                    
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url();?>lib/logintheme/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>lib/logintheme/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>lib/logintheme/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>