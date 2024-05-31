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
            <button type="button" class="btn btn-Abrir btn-primary mx-auto" data-toggle="modal" data-target="#crearProductoModal">Crear Producto</button>
          </div>';

?>
    <div id="nuevo"></div>
    <div id="contenido"></div>



    <div class="modal fade" id="crearProductoModal" tabindex="-1" role="dialog" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modalVentana modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearProductoModalLabel">Crear Producto</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <label for="nombre_p">Nombre:</label>
                        <input class="form-control" type="text" name="nombre_p" id="nombre_p" required>
                        <div class="invalid-feedback">
                        Introduce un nombre
                        </div><br>
                        <label for="tipo">Tipo:</label>
                            <select class="form-control" name="tipo" id="tipo" required>
                                <option value="entrante">Entrante</option>
                                <option value="principal">Principal</option>
                                <option value="postre">Postre</option>
                                <option value="bebida">Bebida</option>
                            </select>
                        <div class="invalid-feedback">
                        Introduce un tipo
                        </div><br>
                        <label for="precio">Precio:</label>
                        <input class="form-control" type="text" name="precio" id="precio" required>
                        <div class="invalid-feedback">
                        Introduce un precio
                        </div><br>
                        <label for="descripcion">Descripción:</label>
                        <input class="form-control" type="text" name="descripcion" id="descripcion" required>
                        <div class="invalid-feedback">
                        Introduce una descripción
                        </div><br>
                        <label for="ingredientes_p">Ingredientes:</label>
                        <input class="form-control" type="text" name="ingredientes_p" id="ingredientes_p" required>
                        <div class="invalid-feedback">
                        Introduce unos ingrdientes
                        </div><br>
                        <label for="archivo">Imagen:</label>
                        <input class="form-control" type="file" name="archivo" id="archivo">
                        <div class="invalid-feedback">
                        Introduce una imgen
                        </div><br><br>


                        <input type="submit" class="btn btn-info btn-primary" value="Crear Producto" name="insertar_producto">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

<?php
    if (isset($array_datos_producto)) {


        echo '<div class="container tabla-container mt-6 mx-auto">
        <h1>Productos</h1>
        <div class="container table-responsive">
          <table class="container table table-striped">
            <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">INGREDIENTES</th>
            <th scope="col">TIPO</th>
            <th scope="col">PRECIO</th>
            <th scope="col">IMAGEN</th>
            <th scope="col">ACCIONES</th>
          </tr>
            </thead>
            <tbody>';
            foreach ($array_datos_producto as $value) {
                if (is_array($value)) {
                    echo "<tr>";
                    echo "<td>" . $value['id_p'] . "</td>"; 
                    echo "<td>" . $value['nombre_p'] . "</td>"; 
                    echo "<td>" . $value['descripcion_p'] . "</td>"; 
                    echo "<td>" . $value['ingredientes_p'] . "</td>"; 
                    echo "<td>" . $value['tipo_p'] . "</td>"; 
                    echo "<td>" . $value['precio_p'] . "</td>"; 
                    echo '<td><img src="imgProductos/' . $value['imagen_p'] . '" alt="Imagen de producto" width="50" height="50"></td>';
    
                    echo '<td>
                    <div class="acciones">
                            <form action="" method="post" style="display:inline;">
                                <input type="hidden" name="id_p" value="' . $value['id_p'] . '">
                                <button type="submit" name="borrar_producto" class="botonAccion botonBorrar">🗑️</button>
                            </form>
                            <input type="hidden" id="id' . $value['id_p'] . '" value="' . $value['id_p'] . '">
                            <input type="hidden" id="nombre' . $value['id_p'] . '" value="' . $value['nombre_p'] . '">
                            <input type="hidden" id="descripcion' . $value['id_p'] . '" value="' . $value['descripcion_p'] . '">
                            <input type="hidden" id="ingredientes_p' . $value['id_p'] . '" value="' . $value['ingredientes_p'] . '">
                            <input type="hidden" id="tipo' . $value['id_p'] . '" value="' . $value['tipo_p'] . '">
                            <input type="hidden" id="precio' . $value['id_p'] . '" value="' . $value['precio_p'] . '">
                            <button class="botonAccion botonModificar" onclick="modificar_producto(' . $value['id_p'] . ')">✏️</button>
                            </div>
                        </td>
                      </tr>';
                }
            }



        echo "</tbody></table></div></div>";
    }







    
?>
    

    

    <script src="JS/funciones.js"></script>
    <script src="JS/ajax.js"></script>
<?php
}
?>
