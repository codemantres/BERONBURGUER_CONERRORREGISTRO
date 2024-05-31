<?php 

class Conectar{
    public static function conexion(){
        try {
            $conexion = new mysqli("bbdd.beronburguer.com", "ddb226543", "u.m7QsOi;V#75D", "ddb226543");
           // $conexion = new mysqli("localhost", "root", "", "ddb226543");
        } catch (Exception $e) {
            die('Error' . $e->getMessage());
        }
        return $conexion;
    }
   
}

?>
