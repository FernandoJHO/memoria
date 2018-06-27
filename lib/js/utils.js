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

  alertify.set('notifier','position', 'top-right');

  alertify.set('notifier','delay', 30);
  alertify.success("Enviando commit...");
  //msg.delay(30).setContent("Enviando commit...");

  $.ajax({
   url: url,
   method: 'post',
   data: {code: source, mensaje: msj, filename: file},
   dataType: 'json',
   timeout: 40000,
   success: function(result) { 
    alertify.set('notifier','delay', 5);
    alertify.success("Commit realizado");
  },
  error: function(xhr,status){
    alertify.set('notifier','delay', 5);
    alertify.error("No se pudo realizar commit");
  }
  });

}

function deleteFile(file,url){

  $.ajax({
   url: url,
   method: 'post',
   data: {nombre_archivo: file},
   dataType: 'json',
   success: function(result) { 
    //location.reload();
    $("#refresh").load(location.href+" #refresh>*","");
  },
  error: function(xhr,status){
    alertify.set('notifier','position', 'top-right');
    alertify.error("No se pudo eliminar archivo");
  }
});
}

function deleteEntrega(entrega,url){

  $.ajax({
   url: url,
   method: 'post',
   data: {id_entrega: entrega},
   dataType: 'json',
   success: function(result) { 
    //location.reload();
    alertify.set('notifier','position', 'top-right');
    alertify.success("Entrega eliminada");
    $("#refresh").load(location.href+" #refresh>*","");
  },
  error: function(xhr,status){
    alertify.set('notifier','position', 'top-right');
    alertify.error("No se pudo eliminar entrega");
  }
});
}

function realizarEntrega(n_entrega,identrega,url){

  $.ajax({
   url: url,
   method: 'post',
   data: {numero_entrega: n_entrega, id_entrega: identrega},
   dataType: 'json',
   success: function(result) { 
    alertify.success("Entrega de código realizada");
    $("#refresh").load(location.href+" #refresh>*","");
  },
  error: function(xhr,status){
    alertify.set('notifier','position', 'top-right');
    alertify.error("No se pudo realizar entrega de código");
  }
});
}

function uploadFile(fileid,url,n_entrega){
  $.ajaxFileUpload({
    url       :url, 
    secureuri   :false,
    fileElementId : fileid,
    dataType    : 'json',
    data: {numero_entrega: n_entrega},
    success : function (data, status)
    {
      alertify.set('notifier','position', 'top-right');
      alertify.success("Entrega de archivo realizada");
    },
    error: function(xhr,status){
      alertify.set('notifier','position', 'top-right');
      alertify.error("No se pudo realizar entrega de archivo");
    }
  });
}

function deleteGrupo(grupo,url){

  $.ajax({
   url: url,
   method: 'post',
   data: {id_grupo: grupo},
   dataType: 'json',
   success: function(result) { 
    //location.reload();
    alertify.set('notifier','position', 'top-right');
    alertify.success("Grupo eliminado");
    $("#refresh").load(location.href+" #refresh>*","");
    $("#newGroupModal").load(location.href+" #newGroupModal>*","");
  },
  error: function(xhr,status){
    alertify.set('notifier','position', 'top-right');
    alertify.error("No se pudo eliminar grupo");
  }
});
}

function deleteIntegrante(mail_integrante,idgrupo,url){

  $.ajax({
   url: url,
   method: 'post',
   data: {id_grupo: idgrupo, mail: mail_integrante},
   dataType: 'json',
   success: function(result) { 
    alertify.set('notifier','position', 'top-right');
    alertify.success("Integrante eliminado");
    $("#refresh").load(location.href+" #refresh>*","");
    $("#GroupModal"+idgrupo).load(location.href+" #GroupModal"+idgrupo+">*","");
    $("#newGroupModal").load(location.href+" #newGroupModal>*","");
  },
  error: function(xhr,status){
    alertify.set('notifier','position', 'top-right');
    alertify.error("No se pudo eliminar integrante");
  }
});
}

function compareCodeMiSeccion(url){

  alertify.set('notifier','position', 'top-right');

  alertify.success("Procesando solicitud...");

  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 
    alertify.success("Comparación realizada");
    document.getElementById("resultado_miseccion").innerHTML = '<p></p> <a href="'+result.link_resultado+'" class="btn btn-success" style="width:100%;" target="_blank"><i class="la la-external-link"></i> Ver resultado</a>';

  },
  error: function(xhr,status){
    alertify.error("No se pudo realizar la comparación");
  }
});

}

function compareCodeSecciones(url){

  alertify.set('notifier','position', 'top-right');

  alertify.success("Procesando solicitud...");

  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 
    alertify.success("Comparación realizada");
    document.getElementById("resultado_secciones").innerHTML = '<p></p> <a href="'+result.link_resultado+'" class="btn btn-success" style="width:100%;" target="_blank"><i class="la la-external-link"></i> Ver resultado</a>';

  },
  error: function(xhr,status){
    alertify.error("No se pudo realizar la comparación");
  }
});

}

function addDropdown(url){

  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   beforeSend: function(){
      $(".loader").show();
   },
   success: add_dropdown_success,
   complete: function(data){
      $(".loader").hide();
   }
});

}


function addDropdown2(url,idgrupo){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   beforeSend: function(){
      $(".loader").show();
   },
   success: add_dropdown2_success,
   complete: function(data){
      $(".loader").hide();
   }
});
}

function addDropdownSecciones(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   beforeSend: function(){
      $(".loader").show();
   },
   success: add_dropdown_secciones_success,
   complete: function(data){
      $(".loader").hide();
   }
});
}

/*
function addDropdown(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 
    $("#container_form").append(result.html);

  },
  error: function(xhr,status){
  }
});
}

function addDropdown2(url,idgrupo){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 
    $("#container_form_"+idgrupo).append(result.html);

  },
  error: function(xhr,status){
  }
});
}

function addDropdownSecciones(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 
    $("#container_form").append(result.html);

  },
  error: function(xhr,status){
  }
});
} 
*/

function deleteRubrica(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 

      alertify.set('notifier','position', 'top-right');
      alertify.success("Rúbrica eliminada");  
      $("#refresh").load(location.href+" #refresh>*","");  

  },
  error: function(xhr,status){
      alertify.set('notifier','position', 'top-right');
      alertify.error("No se pudo eliminar rúbrica");
  }
});
}

function deleteCategoria(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 

      alertify.set('notifier','position', 'top-right');
      alertify.success("Categoría eliminada");  
      $("#refresh").load(location.href+" #refresh>*","");  

  },
  error: function(xhr,status){
      alertify.set('notifier','position', 'top-right');
      alertify.error("No se pudo eliminar categoría");
  }
});
}

function deleteCriterio(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 

      alertify.set('notifier','position', 'top-right');
      alertify.success("Criterio eliminado");  
      $("#refresh").load(location.href+" #refresh>*","");  

  },
  error: function(xhr,status){
      alertify.set('notifier','position', 'top-right');
      alertify.error("No se pudo eliminar criterio");
  }
});
}

function deleteItem(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 

      alertify.set('notifier','position', 'top-right');
      alertify.success("Item eliminado");  
      $("#refresh").load(location.href+" #refresh>*","");  

  },
  error: function(xhr,status){
      alertify.set('notifier','position', 'top-right');
      alertify.error("No se pudo eliminar item");
  }
});
}

function deleteSeccion(url){
  $.ajax({
   url: url,
   method: 'get',
   dataType: 'json',
   success: function(result) { 

      alertify.set('notifier','position', 'top-right');
      alertify.success("Sección eliminada");  
      $("#refresh").load(location.href+" #refresh>*","");  

  },
  error: function(xhr,status){
      alertify.set('notifier','position', 'top-right');
      alertify.error("No se pudo eliminar sección");
  }
});
}

function deleteProfesor(mail_profesor,url){

  $.ajax({
   url: url,
   method: 'post',
   data: {mail: mail_profesor},
   dataType: 'json',
   success: function(result) { 
    alertify.set('notifier','position', 'top-right');
    alertify.success("Profesor eliminado");
    $("#refresh").load(location.href+" #refresh>*","");
  },
  error: function(xhr,status){
    alertify.set('notifier','position', 'top-right');
    alertify.error("No se pudo eliminar profesor");
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