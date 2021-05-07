<?php

namespace App\Clases;

use Conexion\ConexionBD as Conexion;
use PDO;
use PDOException;

include_once "Conexion/autoload.php";

class detallepedido
{

    public function ListarPedidos()
    {
        try {
            $conectar = new Conexion();
            $solicitud = $conectar->abrirConexion();
            $sql = "SELECT * FROM pedido";

            $result = $solicitud->prepare($sql);
            $result->execute();

            $resultado = $result->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function buscarPedido(string $nombre)
    {
        try {
            $conectar = new Conexion();
            $solicitud = $conectar->abrirConexion();
            $sql = "SELECT * FROM pedido where nombre='$nombre'";

            $result = $solicitud->prepare($sql);
            $result->execute();

            $resultado = $result->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
