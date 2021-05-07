<?php

namespace App\Controladores;

use App\Clases\Pedido;

require_once("Conexion/autoload.php");

class ControladorPedido
{
    public function agregarPedido(string $cliente, int $dnicliente, string $ubicacion, string $fechapedido, string $fechaentrega, int $cantidad, string $importetotal, string $estado, string $lista)
    {
        $pedido = new Pedido();
        $nuevo = $pedido->agregarPedido($cliente, $dnicliente, $ubicacion, $fechapedido, $fechaentrega, $cantidad, $importetotal, $estado, $lista);
        if (empty($nuevo)) {
            return $message = "No se ha guardado" . $nuevo;
        } else {
            return $message = "Se ha guardado";
        }
    }

    public function eliminarPedido(int $id)
    {
        $pedido = new Pedido();
        $pedido->EliminarPedido($id);
        $eliminado = $pedido->EncontrarPedido($id);
        if (empty($eliminado)) {
            return "Pedido eliminado";
        } else {
            return "Error no se pudo eliminar el pedido";
        }
    }

    public function modificarPedido(int $idped, string $cliente, int $dnicliente, string $estado, string $fechaentrega, int $cantidad, string $importetotal, string $lista)
    {
        $pedido = new Pedido();
        $pedido->ModificarPedido($idped, $cliente, $dnicliente, $estado, $fechaentrega, $cantidad, $importetotal, $lista);
        return "Pedido cambiado";
    }

    public function ActualizarEstadoPedido(int $id, string $estado): void
    {
        $pedido = new Pedido();
        $pedido->ModificarEstado($id, $estado);
    }

    public function mostrarPedidosporEstado(string $estado)
    {
        $pedido = new Pedido();
        $results = $pedido->MostrarPedidos($estado);
        return $results;
    }

}