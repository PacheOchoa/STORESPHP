    
    <?php 
    
      include_once "php/Conexion.php";

      $sql = "CALL sp_mostrar_datos";

      $ejecutar = $conexion->prepare($sql);

      $ejecutar->execute();

    ?>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar">
        Agregar Nuevo
      </button>


      <table class="table table-light">
          <thead class="thead-light">
              <tr>
                  
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Edad</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>
          <?php while($ver = $ejecutar->fetch()): ?>
              <tr>
              
                  <td><?php echo $ver['Nombre']; ?></td>
                  <td><?php echo $ver['ApellidoPaterno']; ?></td>
                  <td><?php echo $ver['ApellidoMaterno']; ?></td>
                  <td><?php echo $ver['Edad']; ?></td>
                  <td>
                    <span class="fas fa-edit" data-toggle="modal" data-target="#modalUpdate" > </span>
                  </td>
                  <td>
                    
                  </td>
              </tr>
          </tbody>
<?php endwhile; ?>
      </table>