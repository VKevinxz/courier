<?php

namespace App\Clases;
require_once("Conexion/autoload.php");

use Conexion\ConexionBD as Conexion;
use PDO;

class Pedido
{
    public function agregarPedido(string $cliente, int $dnicliente, string $ubicacion, string $fechapedido, string $fechaentrega, int $cantidad, string $importetotal, string $estado, string $lista):void
    {
        $conexionDB = new Conexion();
        $conn = $conexionDB->abrirConexion();
        $sql = "INSERT INTO pedido(cliente, dnicliente, Ubicacion, fechapedido, fechaentrega, cantidad, importetotal, estado, lista) values (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $cliente, PDO::PARAM_STR);
        $stmt->bindParam(2, $dnicliente, PDO::PARAM_INT);
        $stmt->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(4, $fechapedido, PDO::PARAM_STR);
        $stmt->bindParam(5, $fechaentrega, PDO::PARAM_STR);
        $stmt->bindParam(6, $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(7, $importetotal, PDO::PARAM_STR);
        $stmt->bindParam(8, $estado, PDO::PARAM_STR);
        $stmt->bindParam(9, $lista, PDO::PARAM_STR);

        $stmt->execute();
        $conexionDB->cerrarConexion();
    }

    public function MostrarPedidos(string $estado)
    {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "SELECT * FROM pedido WHERE estado='$estado'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conexionBD->cerrarConexion();
        return $stmt;
    }

    public function EliminarPedido(int $idped)
    {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "DELETE FROM pedido Where id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idped, PDO::PARAM_INT);
        $stmt->execute();
        $conexionBD->cerrarConexion();
        return $stmt;
    }

    public function EncontrarPedido(int $idped)
    {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "SELECT * FROM pedido Where id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idped, PDO::PARAM_INT);
        $stmt->execute();
        $conexionBD->cerrarConexion();
        return $stmt;
    }

    public function ModificarPedido(int $idped, string $cliente, int $dnicliente, string $estado, string $fechaentrega, int $cantidad, string $importetotal, string $lista)
    {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "UPDATE pedido SET cliente = '?', dnicliente = ?, fechaentrega = '?', cantidad = ?, importetotal = '?', lista = '?', estado = '?' WHERE id=?";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $cliente, PDO::PARAM_STR);
        $stmt->bindParam(2, $dnicliente, PDO::PARAM_INT);
        $stmt->bindParam(3, $fechaentrega, PDO::PARAM_STR);
        $stmt->bindParam(4, $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(5, $importetotal, PDO::PARAM_STR);
        $stmt->bindParam(6, $lista, PDO::PARAM_STR);
        $stmt->bindParam(7, $estado, PDO::PARAM_STR);
        $stmt->bindParam(8, $idped, PDO::PARAM_INT);

        $stmt->execute();
        $conexionBD->cerrarConexion();
        return $stmt;
    }

    public function ModificarEstado(int $id, string $estado): void
    {
        $conn = new Conexion();
        $co = $conn->abrirConexion();
        $sql = "UPDATE pedido SET estado='$estado' WHERE id=$id ";
        $stmt = $co->prepare($sql);
        $stmt->execute();
        $conn->cerrarConexion();
    }
}