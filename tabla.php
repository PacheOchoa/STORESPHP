    
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
          <?php while($ver = $ejecutar->fetch(PDO::FETCH_NUM)): ?>
              <tr>
              
                  <td><?php echo $ver[1]; ?></td>
                  <td><?php echo $ver[2]; ?></td>
                  <td><?php echo $ver[3]; ?></td>
                  <td><?php echo $ver[4]; ?></td>
                  <td>
                    <span class="fas fa-edit" data-toggle="modal" data-target="#modalUpdate" 
                    onclick="AgregarDatos('<?php echo $ver[0]; ?>')"> </span>
                  </td>
                  <td>
                    
                  </td>
              </tr>
          </tbody>
<?php endwhile; ?>
      </table>