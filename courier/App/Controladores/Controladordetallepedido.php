<?php

namespace App\Controladores;

use App\Clases\detallepedido;

include_once "Conexion/autoload.php";

class Controladordetallepedido
{
    public function VerPedido()
    {
        $productos = new detallepedido();
        return $productos->ListarPedido();
    }

    public function addProduct(string $tipo, string $nombre, string $descripcion, int $precio, string $marca)
    {
        $product = new detallepedido();
        $resultado = $product->addPedido($tipo, $nombre, $descripcion, $precio, $marca);
        if ($resultado != 0) {
            return $message = "<script type='text/javascript'>alert('exito');</script>";
        } else {
            return $message = "<script type='text/javascript'>alert('Mal');</script>";
        }
    }

    public function eliminarProducto(int $id)
    {
        $product = new detallepedido();
        $product->EliminarPedido($id);
        $eliminado = $product->EncontrarPedido($id);
        if (empty($eliminado)) {
            return "detallepedido eliminado";
        } else {
            return "Error no se pudo eliminar el detallepedido";
        }
    }

    public function modificarProducto(string $tipo, string $stock, string $fechavencimiento, string $nombre, string $descripcion, int $precio, string $marca)
    {
        $product = new detallepedido();
        $product->ModificarPedido($tipo, $nombre, $descripcion, $precio, $marca);
        return "detallepedido cambiado";
    }

    public function buscarproducto(string $name)
    {
        $product = new detallepedido();
        return $product->buscarPedido($name);
    }
}