<html>
<head>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<!--<?php echo form_open_multipart('upload/do_upload_2');?>

<input type="file" name="userfile2" size="20" />

<br /><br /> -->

<input type="submit" value="Subir" />

</form>

</body>
</html>