    
    <?php 
    
      include_once "php/Conexion.php";

      $sql = "SELECT * FROM `asesores`";

      $ejecutar = $conexion->prepare($sql);

      $ejecutar->execute();

    ?>
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAgregar">
        Agregar Nuevo
      </button>

      <br>


      <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabla">
          <thead class="thead-light">
              <tr>
                  <th> # </th>
                  <th>Nombre</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>
          <?php while($ver = $ejecutar->fetch(PDO::FETCH_NUM)): ?>
              <tr>
              
                  <td><?php echo $ver[0]; ?></td>
                  <td><?php echo $ver[1]; ?></td>
                  
                  <td>
                    <span class="btn btn-raised btn-warning btn-xs" data-toggle="modal" data-target="#modalUpdate" 
                    onclick="AgregarDatos('<?php echo $ver[0]; ?>')"> Editar </span>
                  </td>

                  <td>
                  <span class="btn btn-raised btn-danger btn-xs"  
                    onclick="Eliminar('<?php echo $ver[0]; ?>')"> Eliminar </span>
                  </td>
              </tr>
          </tbody>
<?php endwhile; ?>
      </table>


    