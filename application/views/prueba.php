<!DOCTYPE html>
<html lang="en">

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="lib/codemirror.js"></script>
        <script src="lib/requestapi.js"></script>
        <link rel="stylesheet" href="lib/codemirror.css">
        <link rel="stylesheet" href="lib/theme/monokai.css">
        <script src="mode/javascript/javascript.js"></script>
        <script src="mode/python/python.js"></script>
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
    
    // function myFunction() {
        

    //     var code = myCodeMirror.getValue() //String(document.getElementById("texto").value);

    //     if(code==""){
    //       alert("Texto vacío");
    //     }else{
        
    //       document.getElementById("output").innerHTML = "Ejecutando..."

    //       $.ajax({
    //            url: '<?php echo base_url() ?>prueba_controller/ejecutar2',
    //            method: 'post',
    //            data: {src: code},
    //            dataType: 'json',
    //            success: function(res) {  
    //               document.getElementById("output").innerHTML = res.compile_status + "\n" + res.web
    //            },
    //            error: function(error){
    //               document.getElementById("output").innerHTML = "Hubo un error"
    //            }
    //        });
    //     }

    // }

    function execute(){
      var code = myCodeMirror.getValue();
      var input = document.getElementById("input").value;
      //var url = '<?php echo base_url() ?>prueba_controller/ejecutar2';
      //var url2 = '<?php echo base_url() ?>prueba_controller/ejecutar5';
      var url = '<?php echo base_url() ?>prueba_controller/jdoodle';
      myFunction(url,code,input);
      //myFunction2(url2);
    }

</script>

</html>