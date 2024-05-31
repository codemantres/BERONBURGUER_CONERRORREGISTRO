<?php
session_start();
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == "modificar") {
         // Formulario para modificar usuario admin completo.
  echo '<div class="container mt-5 ">
            <div class="row justify-content-center  ">
                <div class=" formulario col-md-6">
                    <h1 class="text-center">Modificar Usuario</h1>
                    <form action="" method="post" class="needs-validation" novalidate>
        
                        <input type="hidden" id="id" name="id" value="' . $_POST['id'] . '" readonly>
        
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="' . $_POST['nombre'] . '"  required>
                            <div class="invalid-feedback">Introduce un nombre</div>
                        </div>
        
                        <div class="form-group">
                            <label for="clave">Clave:</label>
                            <input type="text" class="form-control" id="clave" name="clave"  required>
                            <div class="invalid-feedback">Introduce una clave</div>
                        </div>
        
                        <button type="submit" class="btn btn-info btn-primary" name="modificar_admin" >Modificar</button>
                    </form>
        
                    <input type="button" class="btn btn-close btn-secondary mt-3" id="cancelar" name="cancelar" value="Cancelar" onclick="cancelar()">
                </div>
            </div>
        </div>
        <script src="JS/funciones.js"></script>';
    } elseif ($_POST["accion"] == "modificar_user") {
        // Formulario para modificar usuario.
        echo '<div class="container mt-5 ">
            <div class="row justify-content-center  ">
                <div class=" formulario col-md-6">
                    <h1 class="text-center">Modificar Usuario</h1>
                    <form action="" method="post" class="needs-validation" novalidate>
        
                        <input type="hidden" id="id" name="id" value="' . $_POST['id'] . '" readonly>
        
                        <div class="form-group">
                            <label for="nombre_usuario_reg">Nombre:</label>
                            <input type="text" class="form-control" id="nombre_usuario_reg" name="nombre" value="' . $_POST['nombre'] . '" required>
                            <div class="invalid-feedback">Introduce un nombre</div>
                        </div>
        
                        <div class="form-group">
                            <label for="apellidos_usuario_reg">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos_usuario_reg" name="apellidos" value="' . $_POST['apellidos'] . '" required>
                            <div class="invalid-feedback">Introduce unos apellidos</div>
                        </div>
        
                        <div class="form-group">
                            <label for="correo_usuario_reg">Correo:</label>
                            <input type="text" class="form-control" id="correo_usuario_reg" name="correo" value="' . $_POST['correo'] . '" readonly>
                            <div class="invalid-feedback">Introduce un correo</div>
                            </div>
        
                        <div class="form-group">
                            <label for="telefono_usuario_reg">Teléfono:</label>
                            <input type="number" class="form-control" id="telefono_usuario_reg" name="telefono" value="' . $_POST['telefono'] . '" required>
                            <div class="invalid-feedback">Introduce un telefono</div>
                            </div>
        
                        <div class="form-group">
                            <label for="clave">Clave:</label>
                            <input type="text" class="form-control" id="clave" name="clave" required>
                            <div class="invalid-feedback">Introduce una clave</div>
                        </div>
                        
        
                        <button type="submit" class="btn btn-info btn-primary" name="modificar_user">Modificar</button>
                    </form>
        
                    <input type="button" class="btn btn-close btn-secondary mt-3" id="cancelar" name="cancelar" value="Cancelar" onclick="cancelar()">
                </div>
            </div>
        </div>
        <script src="JS/funciones.js"></script>';
        
    } elseif ($_POST["accion"] == "modificar_reserva") {
        // Formulario para modificar reserva.
        echo '<div class="container mt-5 ">
        <div class="row justify-content-center  ">
            <div class=" formulario col-md-6" style="background-color:#097D4C;" >
                <h1 class="text-center">Modificar Reserva</h1>
                <form action="" method="post" class="needs-validation" novalidate>
    
                    <input type="hidden" id="id" name="id" value="' . $_POST['id'] . '" readonly>
    
                    <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="' . $_POST['fecha'] . '"  required>
                    <div class="invalid-feedback">Introduce una fecha</div>
                    </div>
    
                    <div class="form-group">
                    <label for="hora">Hora:</label>
                    <select class="form-control" name="hora" id="hora">
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="21:00">21:00</option>
                    <option value="22:00">22:00</option>
                    <option value="23:00">23:00</option>
                    </select>
                    </div>
    
                    <div class="form-group">
                    <label  for="comensales">Comensales:</label>
                    <select class="form-control" name="comensales" id="comensales">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>
                    </div>
    
                    <div class="form-group">
                    <label for="nota">Nota:</label>
                    <input class="form-control" type="text" id="nota" name="nota" value="' . $_POST['nota'] . '">
                    </div>
    
    
                    <button type="submit" class="btn btn-info btn-primary" name="modificar_reservaC" value="Modificar">Modificar</button>
                </form>
    
                <input type="button" class="btn btn-close btn-secondary mt-3" id="cancelar" name="cancelar" value="Cancelar" onclick="cancelar()">
            </div>
        </div>
    </div>
    <script src="JS/funciones.js"></script>';
    } elseif ($_POST["accion"] == "modificar_producto") {
        // Obtener los datos del producto de $_POST
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $ingredientes_p = isset($_POST['ingredientes_p']) ? $_POST['ingredientes_p'] : '';
    
        // Formulario para modificar producto.
        echo '<div class="container mt-5 ">
        <div class="row justify-content-center  ">
            <div class=" formulario col-md-6">
                <h1 class="text-center">Modificar Producto</h1>
                <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
    
                    <input type="hidden" id="id" name="id" value="' . $id . '" readonly>
    
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="' . $nombre . '"  required>
                        <div class="invalid-feedback">Introduce un nombre</div>
                    </div>
    
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" name="tipo" id="tipo">
                            <option value="entrante" ' . ($tipo == "entrante" ? "selected" : "") . '>Entrante</option>
                            <option value="principal" ' . ($tipo == "principal" ? "selected" : "") . '>Principal</option>
                            <option value="postre" ' . ($tipo == "postre" ? "selected" : "") . '>Postre</option>
                            <option value="bebida" ' . ($tipo == "bebida" ? "selected" : "") . '>Bebida</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input class="form-control" type="float" id="precio" name="precio" value="' . $precio . '"  required>
                        <div class="invalid-feedback">Introduce un precio</div>
                    </div>
    
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" value="' . $descripcion . '"  required><br>
                        <div class="invalid-feedback">Introduce una descripción</div>
                    </div>
    
                    <div class="form-group">
                        <label for="ingredientes_p">Ingredientes:</label>
                        <input class="form-control" type="text" id="ingredientes_p" name="ingredientes_p" value="' . $ingredientes_p . '"  required><br>
                        <div class="invalid-feedback">Introduce unos ingredientes</div>
                    </div>
    
                    <div class="form-group">
                        <label for="archivo">Imagen:</label>
                        <input class="form-control" type="file" name="archivo" id="archivo"  required><br><br>
                        <div class="invalid-feedback">Introduce un archivo</div>
                    </div>
    
                    <button type="submit" class="btn btn-info btn-primary" name="modificar_p">Modificar</button>
                </form>
    
                <input type="button" class="btn btn-close btn-secondary mt-3" id="cancelar" name="cancelar" value="Cancelar" onclick="cancelar()">
            </div>
        </div>
    </div>
    <script src="JS/funciones.js"></script>';


    }
}

// Funcion admin para el administrador, aqui recopilamos las funciones para el login, insertar, modificar y borrar.
function admin()
{
    require_once("modelo/datos_modelo.php");
    $error = '';
    $ok = '';
    $datos = new Datos_modelo();
    if (!isset($_SESSION['nombre_admin'])) {
        $nombre = isset($_POST['nombre_admin']) ? $_POST['nombre_admin'] : '';
        $clave = isset($_POST['clave_admin']) ? $_POST['clave_admin'] : '';
        if ($datos->login_admin($nombre, $clave)) {
            $_SESSION['nombre_admin'] = $nombre;
        } else {
            if ($nombre != '') {
                $error = "Usuario o contraseña no encontrados";
            }
        }
    } else {
        if (isset($_POST['borrar_admin'])) {
            $id = isset($_POST['id_admin']) ? $_POST['id_admin'] : '';

            if ($datos->borrar_admin($id))
                $ok = "Borrado correctamente";
            else
                $error = "Error al borrar";
        } elseif (isset($_POST['insertar_admin'])) {
            $nombre = isset($_POST['nombre_admin']) ? $_POST['nombre_admin'] : '';
            $clave = isset($_POST['clave_admin']) ? $_POST['clave_admin'] : '';


            if ($datos->validar_administrador_no_existe($nombre)) {
                $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
                if ($datos->insertar_admin($nombre, $clave_encriptada))
                    $ok = "Insertado correctamente.";
                else
                    $error = "Error al insertar.";
            } else {
                echo "El nombre ya existe.";
            }
        } elseif (isset($_POST['modificar_admin'])) {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

            if (!empty($clave)) {
                $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
            } else {
                $clave_encriptada = null; 
            }

            if ($datos->modificar_admin($id, $nombre, $clave_encriptada))
                $ok = "Modificado correctamente.";
            else
                $error = "Error al insertar.";
        }
    }
    $array_datos_admin = $datos->get_datos_admin();
    require_once("vista/usuariosAdmin_vista.php");
}


// Funcion user para el administrador, aqui recopilamos las funciones para el login, insertar, modificar y borrar.
function adminUser()
{
    require_once("modelo/datos_modelo.php");
    $error = '';
    $ok = '';
    $datos = new Datos_modelo();
    if (!isset($_SESSION['nombre_admin'])) {
        $nombre = isset($_POST['nombre_admin']) ? $_POST['nombre_admin'] : '';
        $clave = isset($_POST['clave_admin']) ? $_POST['clave_admin'] : '';
        if ($datos->login_admin($nombre, $clave)) {
            $_SESSION['nombre_admin'] = $nombre;
        } else {
            if ($nombre != '') {
                $error = "Usuario o contraseña no encontrados";
            }
        }
    } else {
        if (isset($_POST['borrar_user'])) {
            $id = isset($_POST['id_user']) ? $_POST['id_user'] : '';

            if ($datos->borrar_user($id))
                $ok = "Borrado correctamente";
            else
                $error = "Error al borrar";
        } elseif (isset($_POST['insertar_user'])) {
            $nombre = isset($_POST['nombre_usuario_reg']) ? $_POST['nombre_usuario_reg'] : '';
            $apl = isset($_POST['apellidos_user']) ? $_POST['apellidos_user'] : '';
            $fecha_nacimiento = isset($_POST['edad_user']) ? $_POST['edad_user'] : '';
            $correo = isset($_POST['correo_user']) ? $_POST['correo_user'] : '';
            $clave = isset($_POST['clave_user']) ? $_POST['clave_user'] : '';
            $tlf = isset($_POST['telefono_user']) ? $_POST['telefono_user'] : '';

                if ($datos->validar_usuario_no_existe($correo)) {
                    $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
                    if ($datos->insertar_user($nombre, $apl, $fecha_nacimiento, $correo, $clave_encriptada, $tlf))
                        $ok = "Insertado correctamente.";
                    else
                        $error = "Error al insertar.";
                } else {
                    $error = "El correo ya existe.";
                }
            
        } elseif (isset($_POST['modificar_user'])) {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $apl = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
            $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
            $tlf = isset($_POST['telefono']) ? $_POST['telefono'] : '';
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';

            if (!empty($clave)) {
                $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
            } else {
                $clave_encriptada = null;
            }

            if ($datos->modificar_user($id, $nombre, $apl, $correo, $clave_encriptada, $tlf))
                $ok = "Modificado correctamente.";
            else
                $error = "Error al insertar.";
        }
    }
    $array_datos_user = $datos->get_datos_user();
    require_once("vista/usuariosClientes_vista.php");
}





// Funcion user para el usuario, aqui recopilamos las funciones para el login, insertar, modificar, borrar y reservar. 
function user()
{
    require_once("modelo/datos_modelo.php");
    $error = '';
    $ok = '';
    $datos = new Datos_modelo();

    if (isset($_POST['login'])) {
        $correo = isset($_POST['correo_usuario']) ? $_POST['correo_usuario'] : '';
        $clave = isset($_POST['clave_usuario']) ? $_POST['clave_usuario'] : '';
        if ($datos->login_user($correo, $clave)) {
            $_SESSION['correo_usuario'] = $correo;
        } else {
            if ($correo != '') {
                $error = "Usuario o contraseña no encontrados";
            }
        }
    } elseif (isset($_POST['borrar_r'])) {
        $id = isset($_POST['id_r']) ? $_POST['id_r'] : '';

        if ($datos->borrar_reserva($id))
            $ok = "Borrado correctamente";
        else
            $error = "Error al borrar";
    } elseif (isset($_POST['borrar_user'])) {
        $id = isset($_POST['id_u']) ? $_POST['id_u'] : '';

        if ($datos->borrar_user($id)) {
            desconectar();
            $ok = "Borrado correctamente";
        } else {
            $error = "Error al borrar";
        }
    } elseif (isset($_POST['modificar_user'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apl = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
        $tlf = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '';

        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);

        if ($datos->modificar_user($id, $nombre, $apl, $correo, $clave_encriptada, $tlf))
            $ok = "Modificado correctamente.";
        else
            $error = "Error al insertar.";
    } elseif (isset($_POST['crear_reserva'])) {
        $fecha = isset($_POST['fechar']) ? $_POST['fechar'] : '';
        $id_user = isset($_POST['id_s']) ? $_POST['id_s'] : '';
        $hora = isset($_POST['horar']) ? $_POST['horar'] : '';
        $nota = isset($_POST['nota']) ? $_POST['nota'] : '';
        $comensales = isset($_POST['comensales']) ? $_POST['comensales'] : '';

        $fecha_actual = date('Y-m-d');

        if ($fecha <= $fecha_actual) {
            $error = "No se puede reservar para fechas anteriores.";
        } else {
            if ($datos->insertar_reserva($fecha, $hora, $nota, $comensales, $id_user))
                $ok = "Insertado correctamente.";
            else
                $error = "No hay disponibilidad para este horario:<br> $fecha  |  $hora ";
        }
    } elseif (isset($_POST['modificar_reservaC'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $hora = isset($_POST['hora']) ? $_POST['hora'] : '';
        $nota = isset($_POST['nota']) ? $_POST['nota'] : '';
        $comensales = isset($_POST['comensales']) ? $_POST['comensales'] : '';

        $fecha_actual = date('Y-m-d');

        if ($fecha <= $fecha_actual) {
            $error = "No se puede reservar para fechas anteriores.";
        } else {
            if ($datos->modificar_reserva($id, $fecha, $hora, $nota, $comensales))
                $ok = "Modificado correctamente.";
            else
                $error = "Error al insertar.";
        }
    } elseif (isset($_POST['insertar_user'])) {
        $nombre = isset($_POST['nombre_usuario_reg']) ? $_POST['nombre_usuario_reg'] : '';
        $apellidos = isset($_POST['apellidos_usuario_reg']) ? $_POST['apellidos_usuario_reg'] : '';
        $fecha_nacimiento = isset($_POST['edad_usuario_reg']) ? $_POST['edad_usuario_reg'] : '';
        $correo = isset($_POST['correo_usuario_reg']) ? $_POST['correo_usuario_reg'] : '';
        $clave = isset($_POST['clave_usuario_reg']) ? $_POST['clave_usuario_reg'] : '';
        $telefono = isset($_POST['telefono_usuario_reg']) ? $_POST['telefono_usuario_reg'] : '';
    
        
                if ($datos->validar_usuario_no_existe($correo)) {
                    $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
                    if ($datos->insertar_user($nombre, $apellidos, $fecha_nacimiento, $correo, $clave_encriptada, $telefono)) {
                        $ok = "Usuario insertado correctamente.";
                    } else {
                        $error = "Error al insertar el usuario.";
                    }
                } else {
                    $error = "El correo ya existe.";
                }
            
        
    }
    


    $array_datos = $datos->get_datos_user();
    $array_datos_reserva = $datos->get_datos_reserva();
    require_once("vista/datosUser_vista.php");
}

// Funcion reservas para el admin, aqui recopilamos las funciones para borra y modificar reservas.
function reservas()
{
    require_once("modelo/datos_modelo.php");
    $error = '';
    $ok = '';
    $datos = new Datos_modelo();

    if (isset($_POST['borrar_r'])) {
        $id = isset($_POST['id_r']) ? $_POST['id_r'] : '';

        if ($datos->borrar_reserva($id))
            $ok = "Borrado correctamente";
        else
            $error = "Error al borrar";
    } elseif (isset($_POST['modificar_reservaC'])) {
        $fecha_actual = date('Y-m-d');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $hora = isset($_POST['hora']) ? $_POST['hora'] : '';
        $nota = isset($_POST['nota']) ? $_POST['nota'] : '';
        $comensales = isset($_POST['comensales']) ? $_POST['comensales'] : '';
        if ($fecha <= $fecha_actual) {
            $error = "No se puede reservar para fechas anteriores.";
        } else {
            if ($datos->modificar_reserva($id, $fecha, $hora, $nota, $comensales))
                $ok = "Modificado correctamente.";
            else
                $error = "Error al insertar.";
        }
    }

    $array_datos_reserva = $datos->get_datos_reserva();
    require_once("vista/usuariosReservas_vista.php");
}

// Funcion productos para el admin, aqui recopilamos las funciones para borrar, insertar y modificar productos.
function productos()
{
    require_once("modelo/datos_modelo.php");
    $error = '';
    $ok = '';
    $datos = new Datos_modelo();



    if (isset($_POST['borrar_producto'])) {
        $id = isset($_POST['id_p']) ? $_POST['id_p'] : '';
        if ($datos->borrar_producto($id)) {
            $ok = "Borrado correctamente";
        } else {
            $error = "Error al borrar";
        }
    } else if (isset($_POST['insertar_producto'])) {

        if (!empty($_FILES["archivo"]["tmp_name"])) {
            if (carga_fichero()) {

                $nombre = isset($_POST['nombre_p']) ? $_POST['nombre_p'] : '';
                $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
                $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
                $ingredientes_p = isset($_POST['ingredientes_p']) ? $_POST['ingredientes_p'] : '';
                $imagen = $_FILES["archivo"]["name"];

                if ($precio > 0) {
                    if ($datos->insertar_producto($nombre, $descripcion, $ingredientes_p, $precio, $imagen, $tipo)) {
                        $ok = "Insertado correctamente...";
                    } else {
                        $error = "Error al insertar...";
                    }
                }
            }
        }
    } elseif (isset($_POST['modificar_p'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $ingredientes_p = isset($_POST['ingredientes_p']) ? $_POST['ingredientes_p'] : '';
        $imagen = isset($_FILES["archivo"]["name"]) ? $_FILES["archivo"]["name"] : ''; 

        if (!empty($_FILES["archivo"]["tmp_name"])) {
            if (carga_fichero()) {


                if ($datos->modificar_producto($id, $nombre, $descripcion, $ingredientes_p, $precio, $imagen, $tipo)) {
                    $ok = "Producto modificado correctamente.";
                } else {
                    $error = "Error al modificar producto.";
                }
            }
        }
    }



    $array_datos_producto = $datos->get_datos_producto();
    require_once("vista/usuariosProductos_vista.php");
}

// Funcion para cargar el fichero.
function carga_fichero()
{
    $carpetaDestino = "imgProductos/";
    $origen = $_FILES["archivo"]["tmp_name"];
    $destino = $carpetaDestino . $_FILES["archivo"]["name"];

    return move_uploaded_file($origen, $destino);
}

// Funcion para borrar el fichero.
function borrar_fichero($fichero)
{
    $destino = "imgProductos/" . $fichero;
    unlink($destino);
}

// Funcion para mostrar la carta.
function carta()
{

    require_once("modelo/datos_modelo.php");
    $error = '';
    $datos = new Datos_modelo();

    $array_datos_producto = $datos->get_datos_producto();
    require_once("vista/carta_vista.php");
}


// Funcion para desconectar la sesion.
function desconectar()
{
    session_destroy();
    header("Location: index.php");
}
