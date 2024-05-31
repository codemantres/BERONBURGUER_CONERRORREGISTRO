function cancelar() {
  $("#nuevo").show();
  $("#contenido").hide();
}

function modificar(id) {
  $("#nuevo").hide();
  $("#contenido").show();
  
  $.ajax({
      type: "POST",
      data: {
          accion: "modificar",
          id: $("#id" + id).val(),
          nombre: $("#nombre" + id).val(),
          clave: $("#clave" + id).val()
      },
      url: "controlador/datos_controlador.php",
      success: function(response) {
          $("#contenido").html(response);
      },
      error: function(error) {
          console.error("Error en la solicitud AJAX", error);
      }
  });
}

  
    function modificar_user(id) {
  
      $("#nuevo").hide();
      $("#contenido").show();
      
        $.ajax({
          type: "POST",
          data: {
            accion: "modificar_user",
            id: $("#id"+id).val(),
            nombre: $("#nombre"+id).val(),
            apellidos: $("#apellidos"+id).val(),
            correo: $("#correo"+id).val(),
            telefono: $("#telefono"+id).val(),
            clave: $("#clave"+id).val(),
      
          },
      
          url: "controlador/datos_controlador.php",
          success: function (response) {
           $("#contenido").html(response);
          },
          error: function(error){
            console.error("Error en la solicitud AJAX", error);
          },
      
        });
      }


      function modificar_reserva(id) {
  
        $("#nuevo").hide();
        $("#contenido").show();
        
          $.ajax({
            type: "POST",
            data: {
              accion: "modificar_reserva",
              id: $("#id"+id).val(),
              fecha: $("#fecha"+id).val(),
              hora: $("#hora"+id).val(),
              nota: $("#nota"+id).val(),
              comensales: $("#comensales"+id).val(),        
            },
        
            url: "controlador/datos_controlador.php",
            success: function (response) {
             $("#contenido").html(response);
            },
            error: function(error){
              console.error("Error en la solicitud AJAX", error);
            },
        
          });
        }

        function modificar_producto(id) {
  
          $("#nuevo").hide();
          $("#contenido").show();
          
            $.ajax({
              type: "POST",
              data: {
                accion: "modificar_producto",
                id: $("#id"+id).val(),
                nombre: $("#nombre"+id).val(),
                tipo: $("#tipo"+id).val(),
                descripcion: $("#descripcion"+id).val(),
                ingredientes_p: $("#ingredientes_p"+id).val(),
                precio: $("#precio"+id).val(),        
              },
          
              url: "controlador/datos_controlador.php",
              success: function (response) {
               $("#contenido").html(response);
              },
              error: function(error){
                console.error("Error en la solicitud AJAX", error);
              },
          
            });
          }