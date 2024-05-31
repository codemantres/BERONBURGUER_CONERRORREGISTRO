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
      
      


?>

    <div id="nuevo"></div>
    <div id="contenido"></div>
<?php
$fecha_actual = date('Y-m-d'); // Obtener la fecha actual en formato YYYY-MM-DDs

    if (isset($array_datos_reserva)) {


        echo '<div class="container tabla-container mt-6 mx-auto">
        <h1>Reservas</h1>
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
              $fecha_reserva = $value['fecha_r'];
              $row_class = ($fecha_reserva < $fecha_actual) ? 'table-danger' : (($fecha_reserva >= $fecha_actual) ? 'table-success' : ''); // Aplicar clase si la fecha de la reserva es anterior, igual o posterior a la fecha actual
              echo "<tr class='$row_class'>"; // Aplicar clase a la fila
              foreach ($value as $K => $value2) {
                  echo "<td>" . $value2 . "</td>";
              }
                echo '<td>
                    <div class="acciones">
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
                            </div>
                        </td>
                      </tr>';
            }
        }



        echo "</tbody></table></div></div>";
    }
}

?>



<script src="JS/funciones.js"></script>
<script src="JS/ajax.js"></script>