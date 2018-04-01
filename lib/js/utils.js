function runCode(dir,code,input) {
    

    //var code = myCodeMirror.getValue() //String(document.getElementById("texto").value);

    if(code==""){
      alert("Texto vacío");
    }else{
    
      document.getElementById("output").innerHTML = "Ejecutando...";

      $.ajax({
           url: dir,
           method: 'post',
           data: {src: code, inp: input},
           dataType: 'json',
           success: function(res) {  
              document.getElementById("output").innerHTML = res.output
              //document.getElementById("output").innerHTML = "Compile status: " + res.compile_status + "\n\n" + "Output\n" + res.output; //+ "\n" + "Compile status: " + res.compile_status + "\n" + "Status: " + res.status
           },
           error: function(error){
              document.getElementById("output").innerHTML = "Hubo un error";
           }
       });
    }

}

function commitCode(source, url, msj, file){

  alertify.success("Enviando commit...");

  $.ajax({
   url: url,
   method: 'post',
   data: {code: source, mensaje: msj, filename: file},
   dataType: 'json',
   success: function(result) { 
    alertify.success("Commit realizado");
  },
  error: function(xhr,status){
    alertify.error("No se pudo realizar commit");
  }
  });

}

// function myFunction2(dir) {
    

//       $.ajax({
//            url: dir,
//            method: 'get',
//            dataType: 'json',
//            success: function(res) {  
//               document.getElementById("output").innerHTML = "Compile status: " + res.compile_status + "\n\n" + "Output\n" + res.run_status.output; //+ "\n" + "Compile status: " + res.compile_status + "\n" + "Status: " + res.status
//            },
//            error: function(error){
//               document.getElementById("output").innerHTML = "Hubo un error";
//            }
//        });
    

// }