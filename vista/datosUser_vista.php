<?php
require_once("menu.php");

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


if (isset($_SESSION['correo_usuario'])) {
?>


  <div class="container mt-5">
   
    <div class="btn-center">
      <button type="button" class="btn btn-Abrir btn-primary" data-toggle="modal" data-target="#reservaModal">
        Crear Reserva
      </button>
    </div>

    
    <div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="reservaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modalVentana modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reservaModalLabel">Crear Reserva</h5>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <?php
              if (isset($array_datos)) {
                foreach ($array_datos as $valor) {
                  if (is_array($valor)) {
                    if ($valor['correo_usuario'] == $_SESSION['correo_usuario']) {
                      echo '<input type="hidden" value="' . $valor['id_usuario'] . '" name="id_s" >'; 
                      $id = $valor['id_usuario'];
                    }
                  }
                }
              }
              ?>
              <div class="form-group">
                <label for="fechar">Fecha:</label>
                <input type="date" class="form-control" name="fechar" id="fechar">
              </div>
              <div class="form-group">
                <label for="horar">Hora:</label>
                <select class="form-control" name="horar" id="horar">
                  <option value="14:00">14:00</option>
                  <option value="15:00">15:00</option>
                  <option value="21:00">21:00</option>
                  <option value="22:00">22:00</option>
                  <option value="23:00">23:00</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="text" class="form-control" name="nota" id="nota">
              </div>
              <div class="form-group">
                <label for="comensales">Comensales:</label>
                <select class="form-control" name="comensales" id="comensales">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <div class="btn-center">
                <button type="submit" class="btn btn-info btn-primary" name="crear_reserva">Crear reserva</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div id="nuevo"></div>
  <div id="contenido"></div>
  <?php
  if (isset($array_datos)) {
    echo '<div class="container tabla-container mt-6 mx-auto">
    <h1>Mi cuenta</h1>
    <div class="table-responsive">
      <table class="table table-striped">
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
    foreach ($array_datos as $valor) {
        if (is_array($valor)) {
            if ($valor['correo_usuario'] == $_SESSION['correo_usuario']) {
                echo "<tr>";
                
                echo "<td>" . $valor['id_usuario'] . "</td>";
                echo "<td>" . $valor['nombre_usuario'] . "</td>";
                echo "<td>" . $valor['apellidos_usuario'] . "</td>";
                echo "<td>" . $valor['correo_usuario'] . "</td>";
                echo "<td>" . $valor['telefono_usuario'] . "</td>";
                echo "<td>" . $valor['edad_usuario'] . "</td>";
                
                echo '<td>
                        <button type="button" class="botonAccion botonBorrar" data-toggle="modal" data-target="#deleteModal' . $valor['id_usuario'] . '">🗑️</button>
                        
                        <input type="hidden" id="id' . $valor['id_usuario'] . '" value="' . $valor['id_usuario'] . '">
                        <input type="hidden" id="nombre' . $valor['id_usuario'] . '" value="' . $valor['nombre_usuario'] . '">
                        <input type="hidden" id="apellidos' . $valor['id_usuario'] . '" value="' . $valor['apellidos_usuario'] . '">
                        <input type="hidden" id="correo' . $valor['id_usuario'] . '" value="' . $valor['correo_usuario'] . '">
                        <input type="hidden" id="telefono' . $valor['id_usuario'] . '" value="' . $valor['telefono_usuario'] . '">
                        <input type="hidden" id="clave' . $valor['id_usuario'] . '" value="' . $valor['clave_usuario'] . '">
                        <button class="botonAccion botonModificar" onclick="modificar_user(' . $valor['id_usuario'] . ')">✏️</button>

                        
                    </td>
                </tr>';

                
                echo '<div class="modal fade" id="deleteModal' . $valor['id_usuario'] . '" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel' . $valor['id_usuario'] . '" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel' . $valor['id_usuario'] . '">Confirmación de eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar tu cuenta?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="" method="post" style="display:inline;">
                                        <input type="hidden" name="id_u" value="' . $valor['id_usuario'] . '">
                                        <button type="submit" name="borrar_user" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }
    }

    echo "</tbody></table></div></div>";
}

$fecha_actual = date('Y-m-d'); // Obtener la fecha actual en formato YYYY-MM-DD




if (isset($array_datos_reserva)) {
    echo '<div class="container tabla-container mt-6 mx-auto">
    <h1>Mis Reservas</h1>
    <p class="text-center">Las reservas  <span style="color: red;">caducadas aparecerán en rojo</span> y las <span style="color: green;">próximas en verde</span>.</p>
    <div class="container table-responsive">
      <table class="container table table-striped">
        <thead>
          <tr>
            <th scope="col">ID RESERVA</th>
            <th scope="col">FECHA RESERVA</th>
            <th scope="col">HORA RESERVA</th>
            <th scope="col">ID USUARIO</th>
            <th scope="col">NOTA</th>
            <th scope="col">COMENSALES</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
        <tbody>';
    foreach ($array_datos_reserva as $value) {
        if (is_array($value)) {
            if ($value['id_usuario'] == $id) {
                $fecha_reserva = $value['fecha_r'];
                $row_class = ($fecha_reserva < $fecha_actual) ? 'table-danger' : (($fecha_reserva >= $fecha_actual) ? 'table-success' : ''); // Aplicar clase si la fecha de la reserva es anterior, igual o posterior a la fecha actual
                echo "<tr class='$row_class'>"; // Aplicar clase a la fila
                foreach ($value as $K => $value2) {
                    echo "<td>" . $value2 . "</td>";
                }
                echo '<td>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id_r" value="' . $value['id_r'] . '">
                            <button type="submit" name="borrar_r" class="botonAccion botonBorrar">🗑️</button>
                        </form>

                        <input type="hidden" id="id' . $value['id_r'] . '" value="' . $value['id_r'] . '">
                        <input type="hidden" id="fecha' . $value['id_r'] . '" value="' . $value['fecha_r'] . '">
                        <input type="hidden" id="hora' . $value['id_r'] . '" value="' . $value['hora_r'] . '">
                        <input type="hidden" id="nota' . $value['id_r'] . '" value="' . $value['nota_r'] . '">
                        <input type="hidden" id="comensales' . $value['id_r'] . '" value="' . $value['comensales_r'] . '">
                        <button class="botonAccion botonModificar" onclick="modificar_reserva(' . $value['id_r'] . ')">✏️</button>
                      </td>
                  </tr>';
            }
        }
    }
    echo "</tbody></table></div></div>";
}

} else {

  ?>



  <div id="loginDiv" style="display: block;">
    <div id="loginForm" class="container-fluid d-flex justify-content-center">
      <div class="loginUser p-5 rounded-5 text-secondary shadow" style="width: 25rem; background-color: #097D4C;">
        <form action="" method="post" class="needs-validation" novalidate>
          <div class="textLogin text-center fs-1 fw-bold">Iniciar Sesión</div>
          <div class="input-group mt-4">
            <div class="input-group-text bg-black">
              <img src="media/username-icon.svg" alt="username-icon" style="height: 1rem" />
            </div>
            <input class="form-control bg-light" type="mail" id="correo_usuario" name="correo_usuario" placeholder="Correo" required>
            <div class="invalid-feedback">
              Introduce un correo
            </div>
          </div>
          <div class="input-group mt-1">
            <div class="input-group-text bg-black">
              <img src="media/password-icon.svg" alt="password-icon" style="height: 1rem" />
            </div>
            <input class="form-control bg-light" type="password" id="clave_usuario" name="clave_usuario" placeholder="Contraseña" required>
            <button class="verClave" type="button" id="eyeLogin" onclick="verClaveLogin()">
            <img src="media/ver.png" alt="Mostrar Contraseña" class="verimg">
          </button>

            <!-- <img src="media/ver.png" alt="Mostrar Contraseña" class="verClave" id="eyeLogin"> -->
            <div class="invalid-feedback">
              Introduce una contraseña
            </div>
          </div>
          <input class="btn btn-Crear  w-100 mt-4 fw-semibold shadow-sm" type="submit" class="btnLogin" value="Login" name="login">

          <div class="d-flex justify-content-center mt-1">
            <div class="margen20">¿No tienes cuenta todavía?</div>
          </div>
          <div class="d-flex justify-content-center mt-1">
            <button type="button" class="btn btn-info   mt-4 fw-semibold shadow-sm " onclick="mostrarRegistroForm()">Crear Cuenta</button>
          </div>
        </form>
      </div>
    </div>
  </div>















  <div id="registroDiv" style="display: none;">
    <div id="registroForm" class="container mt-4 mx-auto px-3">
      <form action="" method="POST" onsubmit="return validarReg()">
        <div class="textRegistro text-center fs-1 fw-bold">Nuevo Usuario</div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nombre_usuario_reg">Nombre:</label>
            <input type="text" class="form-control" id="nombre_usuario_reg" name="nombre_usuario_reg"  placeholder="Nombre">
            
          </div>
          <div class="form-group col-md-6">
            <label for="apellidos_usuario_reg">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos_usuario_reg" name="apellidos_usuario_reg"  placeholder="Apellidos">
            
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="edad_usuario_reg">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="edad_usuario_reg" name="edad_usuario_reg" >
            
          </div>
          <div class="form-group col-md-6">
            <label for="telefono_usuario_reg">Teléfono:</label>
            <input type="text" class="form-control" id="telefono_usuario_reg" name="telefono_usuario_reg"  placeholder="Teléfono">
            
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="correo_usuario_reg">Correo Electrónico:</label>
            <input type="text" class="form-control" id="correo_usuario_reg" name="correo_usuario_reg"  placeholder="Correo electrónico">
            
          </div>
          <div class="form-group col-md-6">
            <label for="clave_usuario_reg">Contraseña:</label>
            <div class="input-group">
              <input type="password" class="form-control" id="clave_usuario_reg" name="clave_usuario_reg"  placeholder="Contraseña">
              <img src="media/ver.png" alt="Mostrar Contraseña" class="verClave" id="eyeRegistro">
              
            </div>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" name="insertar_user" class="btn btn-registro" >Crear Usuario</button>
        </div>
      </form>
      <div id="cuentaExistente">
        <div class="d-flex justify-content-center mt-1">
          <div class="margen20">¿Ya eres usuario?</div>
        </div>
        <div class="d-flex justify-content-center mt-1">
          <button type="button" class="btn btnCrear mt-4 fw-semibold shadow-sm" onclick="mostrarLoginForm()">Iniciar Sesión</button>
        </div>
      </div>
    </div>
  </div>









  <script src="JS/funciones.js"></script>
<?php
}

?>
<script src="JS/funciones.js"></script>
<?php

require_once("footer.php");

?>

