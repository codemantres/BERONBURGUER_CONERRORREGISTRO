<?php
if (isset($_SESSION['nombre_admin'])) {
  require_once("menuAdmin.php");


  if (!empty($error)) {
?>
    <div id="error-div" class="error">
      <span class="icono-warning">⚠️</span>
      <?php echo $error; ?>
    </div>
    <script>
      window.addEventListener('load', function() {
        mostrarYOcultarError();
      });
    </script>
  <?php
  }

  if (!empty($ok)) {
  ?>
    <div id="ok-div" class="ok">
      <span class="icono-warning">✅</span>
      <?php echo $ok; ?>
    </div>
    <script>
      window.addEventListener('load', function() {
        mostrarYOcultarOk();
      });
    </script>
  <?php
  }



  echo '<div class="btn-center">
            <button type="button" class="btn btn-Abrir btn-primary mx-auto" data-toggle="modal" data-target="#crearUsuarioModal">Crear Usuario</button>
          </div>';

  ?>

  <div id="nuevo"></div>
  <div id="contenido"></div>

  <div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modalVentana modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Usuario</h5>
        </div>
        <div class="modal-body">
        <div id="erroresModal" class="error-Modal" style="display: none;"></div>
          <form action="" method="post" onsubmit="return validarRegModal()">
            <label for="nombre_user">Nombre:</label>
            <input type="text" class="form-control" name="nombre_usuario_reg" id="nombre_usuario_reg_modal">
            <br>
            <label for="apellidos_user">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos_user" id="apellidos_usuario_reg_modal">
            <br>
            <label for="edad_user">Edad:</label>
            <input type="date" class="form-control" name="edad_user" id="edad_usuario_reg_modal">
            <br>
            <label for="correo_user">Correo:</label>
            <input type="email" class="form-control" name="correo_user" id="correo_usuario_reg_modal">
            <br>
            <label for="telefono_user">Telefono:</label>
            <input type="number" class="form-control" name="telefono_user" id="telefono_usuario_reg_modal">
            <br>
            <label for="clave_user">Clave:</label>
            <input type="password" class="form-control" name="clave_user" id="clave_usuario_reg_modal">
            <br>


            <input type="submit" class="btn btn-info btn-primary" value="Crear Usuario" name="insertar_user">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

<?php
  if (isset($array_datos_user)) {


    echo '<div class="container tabla-container mt-6 mx-auto">
    <h1>Clientes</h1>
    <div class="container table-responsive">
      <table class="container table table-striped">
      
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">CORREO</th>
            <th scope="col">TELEFONO</th>
            <th scope="col">FECHA NACIMIENTO</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
        <tbody>';
    foreach ($array_datos_user as $valor) {
      if (is_array($valor)) {
        echo "<tr>";

        echo "<td>" . $valor['id_usuario'] . "</td>";
        echo "<td>" . $valor['nombre_usuario'] . "</td>";
        echo "<td>" . $valor['apellidos_usuario'] . "</td>";
        echo "<td>" . $valor['correo_usuario'] . "</td>";
        echo "<td>" . $valor['telefono_usuario'] . "</td>";
        echo "<td>" . $valor['edad_usuario'] . "</td>";
        echo '<td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id_user" value="' . $valor['id_usuario'] . '">
                            <button type="submit" name="borrar_user" class="botonAccion botonBorrar">🗑️</button>
                        </form>
                        
                      <input type="hidden" id="id' . $valor['id_usuario'] . '" value="' . $valor['id_usuario'] . '">
                      <input type="hidden" id="nombre' . $valor['id_usuario'] . '" value="' . $valor['nombre_usuario'] . '">
                      <input type="hidden" id="apellidos' . $valor['id_usuario'] . '" value="' . $valor['apellidos_usuario'] . '">
                      <input type="hidden" id="correo' . $valor['id_usuario'] . '" value="' . $valor['correo_usuario'] . '">
                      <input type="hidden" id="telefono' . $valor['id_usuario'] . '" value="' . $valor['telefono_usuario'] . '">
                      <input type="hidden" id="clave' . $valor['id_usuario'] . '" value="' . $valor['clave_usuario'] . '">
                      <button class="botonAccion botonModificar" onclick="modificar_user(' . $valor['id_usuario'] . ')">✏️</button>
                  </td>
              </tr>';
      }
    }
  }

  echo "</tbody></table></div></div>";
}
?>






<script src="JS/funciones.js"></script>
<script src="JS/ajax.js"></script>