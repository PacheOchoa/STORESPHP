<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASESORES DE GUIA</title>
    <?php require_once 'dependencias.php'; ?>
</head>
<body>
    <div class="container">
       <br>
        <h1>ASESORES DE GUIA </h1>
        <div class="row">
          <div class="col-sm-12">
             <div id="tablastores">
             
             </div>
          </div>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Asesor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <form id="frmAgregar" method="post">

              <label for="Nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control input-sm">
             

         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnAgregar">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal update -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <form id="frmUpdate" method="post">
              <input type="hidden" name="idpersona" id="idpersona" class="form-control input-sm">
              <label for="Nombre">Nombre</label>
              <input type="text" name="nombreU" id="nombreU" class="form-control input-sm">
             
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnUpdate">Actualizar</button>
      </div>
    </div>
  </div>
</div>


 <script>
   $(document).ready(function(){
       $('#tablastores').load('tabla.php');
       $('#btnAgregar').click(function(){
           if(validarFormVacio('frmAgregar') > 0){
              alertify.alert("Debes llenar los campos");
              return false;
           }
           
          

        datos = $('#frmAgregar').serialize();
        
       


        $.ajax({
            type : "POST",
            data : datos,
            url : "php/insertar.php",
            success : function(r){
                if(r==1){
                    $('#frmAgregar')[0].reset();
                    $('#tablastores').load('tabla.php');

                    alertify.success("Insertado con exito :)");
                    

                }else{
                  alertify.error(r);
                }
            }
        });
    });

        });
       

   function validarFormVacio(formulario){
    datos=$('#' + formulario).serialize();
    d=datos.split('&');
    vacios=0;
    for(i=0;i< d.length;i++){
      controles=d[i].split("=");
      if(controles[1]=="A" || controles[1]==""){
        vacios++;
      }
    }
    return vacios;
  }
 </script>


  <script> 
     function AgregarDatos(idpersona){

       
      
        $.ajax({
            type : "POST",
            data : "idpersona=" + idpersona,
            url : "php/obtenDatos.php",
            success : function(r){
                

                datos = jQuery.parseJSON(r);

                console.log(datos);


                $('#idpersona').val(datos['id']);
                $('#nombreU').val(datos['nombre']);
               


            }
        });
     }
  </script>

  <script>
      $(document).ready(function(){
        $('#btnUpdate').click(function(){
           datos = $('#frmUpdate').serialize();
           $.ajax({
              type :"POST",
              data:datos,
              url :"php/actualizar.php",
              success:function(r){
                 if(r==1){
                   $('#frmUpdate')[0].reset();
                   $('#tablastores').load('tabla.php');
                   alertify.success("se actualizó con exito");
                 }else{
                    alertify.success("NO se pudo actualizar :/");
                 }
              }

           });
        });
      });
  </script>

  <script>
      function Eliminar(idpersona){
        alertify.confirm("¿Deseas eliminar? ",
        function(){
          $.ajax({
              type :"POST",
              data :"idpersona=" +idpersona,
              url :"php/eliminar.php",
              success: function(r){
                 if(r==1){
                  $('#tablastores').load('tabla.php');
                    alertify.success("Eliminado");
                 }else{
                  alertify.error("NO SE PUDO ELIMINAR :/");
                 }
              }
          });
        }
        ,function(){
          alertify.error('cancelo');
        });
      }

  </script>

</body>
</html>