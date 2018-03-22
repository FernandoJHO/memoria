<!DOCTYPE html>
<html lang="en">

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="lib/codemirror.js"></script>
        <script src="lib/utils.js"></script>
        <script src="lib/alertify/alertify.min.js"></script>
        <link rel="stylesheet" href="lib/alertify/alertify.min.css">
        <link rel="stylesheet" href="lib/codemirror.css">
        <link rel="stylesheet" href="lib/theme/monokai.css">
        <script src="mode/javascript/javascript.js"></script>
        <script src="mode/python/python.js"></script>
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
        <!--<form method="post" action="<?php echo base_url() ?>prueba_controller/ejecutar">
            <div class="row">
                            <div class="form-group">
                              <input type="text" name="code" class="form-control" placeholder="Codigo" required="true">
                            </div>
            </div>

            <div class="row">
                <input type="submit" class="btn btn-primary btn-block" value="Enviar">
            </div>

            <div class="row">
                <?php echo $this->session->flashdata('msg'); ?> 
            </div> 
        </form> -->

        <div class="row" id="editor">
        </div>

        <!--<textarea id="texto"></textarea>-->
        <button onclick="execute()">Execute</button>
        <button onclick="commit()">Commit</button>

        <!--<textarea id="codeinput" name="code" rows="0" cols="0" form="usrform" style="display:none;"> </textarea>
        <form method="post" action="<?php echo base_url() ?>prueba_controller/commit" id="usrform">

            <input type="submit" class="btn btn-primary btn-block" value="Commit">
        </form> -->

        <div class="row">
            <textarea id="input" rows="10" cols="40"></textarea>
        </div>
        <div class="row">
            <textarea id="output" rows="10" cols="60"></textarea>
        </div>
    </body>

<script type="text/javascript">

    var myCodeMirror = CodeMirror(document.getElementById("editor"), {
      mode:  "python",
      theme: "monokai",
      lineNumbers: true
    });
    var codigo = <?php echo json_encode($contenido); ?>;
    myCodeMirror.setValue(codigo);

    function commit(){
        var codigo = myCodeMirror.getValue();
        var url = '<?php echo base_url() ?>prueba_controller/commit';
        
        commitCode(codigo,url);
    }

    function execute(){
      var code = myCodeMirror.getValue();
      var input = document.getElementById("input").value;
      //var url = '<?php echo base_url() ?>prueba_controller/ejecutar2';
      //var url2 = '<?php echo base_url() ?>prueba_controller/ejecutar5';
      var url = '<?php echo base_url() ?>prueba_controller/jdoodle';
      runCode(url,code,input);
      //myFunction2(url2);
    }

</script>

</html>