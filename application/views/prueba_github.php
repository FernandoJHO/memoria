<!DOCTYPE html>
<html lang="en">

    <head>
    </head>

    <body>

    	<!--<?php foreach($repositorios as $repositorio): ?>
			<p> <?php echo $repositorio['name'] ?> </p>
		<?php endforeach; ?> -->

		<!-- <p> <?php echo $sha ?> </p> -->

		<!--<textarea id="output" rows="60" cols="60"> <?php echo $content ?> </textarea> -->

		<textarea id="output" name="code" rows="60" cols="60" form="usrform"> </textarea>

		<form method="post" action="<?php echo base_url() ?>prueba_github/commit" id="usrform">
            <input type="submit" class="btn btn-primary btn-block" value="Enviar">
        </form>
		

    </body>

</html>