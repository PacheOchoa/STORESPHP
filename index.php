<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD STORES PHP</title>
    <?php require_once 'dependencias.php'; ?>
</head>
<body>
    <div class="container">
       <br>
        <h1>CRUD CON STORE PROCEDURE EN PHP </h1>
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <form id="frmAgregar" method="post">

              <label for="Nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control input-sm">
              <label for="ApellidoPaterno">Apellido Paterno</label>
              <input type="text" name="ApellidoPaterno" id="ApellidoPaterno"  class="form-control input-sm">

              <label for="ApellidoMaterno">Apellido Materno</label>
              <input type="text" name="ApellidoMaterno" id="ApellidoMaterno"  class="form-control input-sm">

              

              <label for="Edad">Edad</label>
              <input type="text" name="Edad" id="Edad"  class="form-control input-sm">

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

         <form id="frmAgregar" method="post">

              <label for="Nombre">Nombre</label>
              <input type="text" name="nombreU" id="nombreU" class="form-control input-sm">
              <label for="ApellidoPaterno">Apellido Paterno</label>
              <input type="text" name="ApellidoPaternoU" id="ApellidoPaternoU"  class="form-control input-sm">

              

              <label for="ApellidoMaterno">Apellido Materno</label>
              <input type="text" name="ApellidoMaternoU" id="ApellidoMaternoU"  class="form-control input-sm">

              <label for="Edad">Edad</label>
              <input type="text" name="EdadU" id="EdadU"  class="form-control input-sm">

         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnUpdate">Guardar</button>
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
                  alertify.error("No se pudo insertar :/");
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
</body>
</html>