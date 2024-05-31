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
    <button type="button" class="btn btn-Abrir btn-primary mx-auto" data-toggle="modal" data-target="#crearAdminModal">Crear Admin</button>
  </div>';

    ?>
    <div id="nuevo"></div>
    <div id="contenido"></div>


    <div class="modal fade" id="crearAdminModal" tabindex="-1" role="dialog" aria-labelledby="crearAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modalVentana modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearAdminModalLabel">Crear Admin</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <label for="nombre_admin">Nombre:</label>
                        <input class="form-control" type="text" name="nombre_admin" id="nombre_admin" required>
                        <div class="invalid-feedback">
                            Introduce un nombre
                        </div><br>

                        <label for="clave_admin">Clave:</label>
                        <input class="form-control" type="password" name="clave_admin" id="clave_admin" required><br>
                        <div class="invalid-feedback">
                            Introduce una clave
                        </div><br>

                        <input type="submit" class="btn btn-info btn-primary" value="Crear Administrador" name="insertar_admin">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($array_datos_admin)) {


        echo '<div class="container tabla-container mt-6 mx-auto">
    <h1>Administradores</h1>
    <div class="container  table-responsive">
      <table class="container table table-striped">
      
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($array_datos_admin as $value) {
            if (is_array($value)) {
                echo "<tr>";

                echo "<td>" . $value['id_admin'] . "</td>";
                echo "<td>" . $value['nombre_admin'] . "</td>";

                echo '<td>
                <div class="acciones">
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id_admin" value="' . $value['id_admin'] . '">';
                if ($_SESSION['nombre_admin'] != $value['nombre_admin']) {
                    echo '<button type="submit" name="borrar_admin" class="botonAccion botonBorrar">🗑️</button>';
                }
                echo    '</form>

                        <input type="hidden" id="id' . $value['id_admin'] . '" value="' . $value['id_admin'] . '">
                        <input type="hidden" id="nombre' . $value['id_admin'] . '" value="' . $value['nombre_admin'] . '">
                        <input type="hidden" id="clave' . $value['id_admin'] . '" value="' . $value['clave_admin'] . '">
                        <button class="botonAccion botonModificar" onclick="modificar(' . $value['id_admin'] . ')">✏️</button>
                        </div>
                    </td>
                  </tr>';
            }
        }



        echo "</tbody></table></div></div>";
    }
} else {
    require_once("menu.php");
    ?>
    <div class="fondo-login">
        <?php
        if (isset($_POST['nombre_admin'])) {
            if (!empty($error)) {


        ?>
                <div id="error-mensaje" class="error">
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
        }
        ?>

        <div id="loginDiv">
            <div id="loginForm" class="container-fluid d-flex justify-content-center">
                <div class="loginUser p-5 rounded-5 text-secondary shadow" style="width: 25rem; background-color: #097D4C;">
                    <form action="" method="post" class="needs-validation" novalidate>
                        <div class="textLogin text-center fs-1 fw-bold">Panel Admin</div>
                        <div class="input-group mt-4">
                            <div class="input-group-text bg-black">
                                <img src="media/username-icon.svg" alt="username-icon" style="height: 1rem" />
                            </div>
                            <input class="form-control bg-light" type="text" id="nombre_admin" name="nombre_admin" placeholder="Usuario Admin.." required>
                            <div class="invalid-feedback">
                                Introduce un usuario
                            </div>
                        </div>
                        <div class="input-group mt-1">
                            <div class="input-group-text bg-black">
                                <img src="media/password-icon.svg" alt="password-icon" style="height: 1rem" />
                            </div>
                            <input class="form-control bg-light" type="text" id="clave_admin" name="clave_admin" placeholder="Contraseña.." required>
                            <div class="invalid-feedback">
                                Introduce una contraseña
                            </div>
                        </div>
                        <input class="btn btn-Crear  w-100 mt-4 fw-semibold shadow-sm" type="submit" value="Login">

                    </form>
                </div>
            </div>
        </div>


    </div>
    </div>


    
<?php
}
?>
<script src="JS/funciones.js"></script>
<script src="JS/ajax.js"></script>
