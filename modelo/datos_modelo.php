<?php

class Datos_modelo
{
    private $db; 
    private $datos_admin;
    private $datos_user; 
    private $datos_reserva; 
    private $datos_producto; 

    public function __construct()
    {
        require_once ("modelo/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos_admin = array();
        $this->datos_user = array();
        $this->datos_reserva = array();
        $this->datos_producto = array();
    }

    public function get_datos_admin()
    {
        $sql = "SELECT * FROM administradores";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos_admin[] = $registro;
        }
        return $this->datos_admin;
    }

    public function get_datos_user()
    {
        $sql = "SELECT * FROM usuarios";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos_user[] = $registro;
        }
        return $this->datos_user;
    }

    public function get_datos_reserva()
    {
        $sql = "SELECT * FROM reservas";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos_reserva[] = $registro;
        }
        return $this->datos_reserva;
    }

    public function get_datos_producto()
    {
        $sql = "SELECT * FROM productos";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos_producto[] = $registro;
        }
        return $this->datos_producto;
    }

    public function login_admin($user, $password)
    {
        $login = false;
        $sql = "SELECT clave_admin FROM administradores WHERE nombre_admin = ? ";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("s", $user); 
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($clave_hash);
                $stmt->fetch();
                if (password_verify($password, $clave_hash)) {
                    $login = true;
                }
            }
            $stmt->close();
        }
        return $login;
    }
    

    

    public function insertar_admin($nombre, $clave)
    {
        $sql = "INSERT INTO administradores (nombre_admin, clave_admin) VALUES (?, ?)";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("ss", $nombre, $clave);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    function modificar_admin($id, $nombre, $clave)
    {
        $sql = "UPDATE administradores SET nombre_admin = ?, clave_admin = ? WHERE id_admin = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("ssi", $nombre, $clave, $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function borrar_admin($id)
    {
        $sql = "DELETE FROM administradores WHERE id_admin = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function validar_administrador_no_existe($nombre)
    {
        $adminNoExiste = true;
        $sql = "SELECT * FROM administradores WHERE nombre_admin = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("s", $nombre);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $adminNoExiste = false;
            }
            $stmt->close();
        }
        return $adminNoExiste;
    }

    public function login_user($correo, $password)
{
    $login = false;
    $sql = "SELECT clave_usuario FROM usuarios WHERE correo_usuario = ?";
    if ($stmt = $this->db->prepare($sql)) {
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($clave_hash);
            $stmt->fetch();
            if (password_verify($password, $clave_hash)) {
                $login = true;
            }
        }
        $stmt->close();
    }
    return $login;
}

    public function insertar_user($nombre, $apl, $edad, $correo, $clave, $tlf)
    {
        $sql = "INSERT INTO usuarios (nombre_usuario, apellidos_usuario, edad_usuario, correo_usuario, clave_usuario, telefono_usuario) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("ssssss", $nombre, $apl, $edad, $correo, $clave, $tlf);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    function modificar_user($id, $nombre, $apl, $correo, $clave, $tlf)
    {
        $sql = "UPDATE usuarios SET nombre_usuario = ?, apellidos_usuario = ?, correo_usuario = ?, clave_usuario = ?, telefono_usuario = ? WHERE id_usuario = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("sssssi", $nombre, $apl, $correo, $clave, $tlf, $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function borrar_user($id)
    {
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function validar_usuario_no_existe($correo)
    {
        $usuarioNoExiste = true;
        $sql = "SELECT * FROM usuarios WHERE correo_usuario = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $usuarioNoExiste = false;
            }
            $stmt->close();
        }
        return $usuarioNoExiste;
    }

    public function insertar_reserva($fecha, $hora, $nota, $comensales, $id_user)
{
   

    $sql_reservas = "SELECT COUNT(*) AS num_reservas FROM reservas WHERE fecha_r = ? AND hora_r = ?";
    if ($stmt_reservas = $this->db->prepare($sql_reservas)) {
        $stmt_reservas->bind_param("ss", $fecha, $hora);
        $stmt_reservas->execute();
        $stmt_reservas->bind_result($num_reservas);
        $stmt_reservas->fetch();
        $stmt_reservas->close();

        if ($num_reservas < 20) {
            $sql_insert = "INSERT INTO reservas (fecha_r, hora_r, nota_r, comensales_r, id_usuario) VALUES (?, ?, ?, ?, ?)";
            if ($stmt_insert = $this->db->prepare($sql_insert)) {
                $stmt_insert->bind_param("sssii", $fecha, $hora, $nota, $comensales, $id_user);
                $result = $stmt_insert->execute();
                if ($result) {
                    error_log("Reserva insertada correctamente para el usuario con id $id_user.");
                } else {
                    error_log("Error al ejecutar la inserción de reserva: " . $stmt_insert->error);
                }
                $stmt_insert->close();
                return $result;
            } else {
                error_log("Error al preparar la consulta de inserción de reserva.");
            }
        } else {
            error_log("No hay disponibilidad para la fecha $fecha y la hora $hora.");
            return false;
        }
    } else {
        error_log("Error al preparar la consulta de verificación de reservas.");
        return false;
    }
    return false;
}



    function modificar_reserva($id, $fecha, $hora, $nota, $comensales)
    {
        $sql = "UPDATE reservas SET fecha_r = ?, hora_r = ?, nota_r = ?, comensales_r = ? WHERE id_r = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("sssii", $fecha, $hora, $nota, $comensales, $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function borrar_reserva($id)
    {
        $sql = "DELETE FROM reservas WHERE id_r = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function insertar_producto($nombre, $descripcion, $ingredientes_p, $precio, $archivo, $tipo) {
        $stmt = $this->db->prepare("INSERT INTO productos (nombre_p, descripcion_p, precio_p, imagen_p, tipo_p, ingredientes_p) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdssi", $nombre, $descripcion, $ingredientes_p, $precio, $imagen, $tipo, $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return "Error al insertar: " . $stmt->error;
        }
    }
    
    

    public function borrar_producto($id) {
        $sql = "DELETE FROM productos WHERE id_p = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function modificar_producto($id, $nombre, $descripcion, $ingredientes_p, $precio, $imagen, $tipo) {
        $sql = "UPDATE productos SET nombre_p=?, descripcion_p=?, ingredientes_p=?, precio_p=?, imagen_p=?, tipo_p=? WHERE id_p=?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("sssdssi", $nombre, $descripcion, $ingredientes_p, $precio, $imagen, $tipo, $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }
    
    
}

?>