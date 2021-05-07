<?php

session_start();
include_once "Conexion/autoload.php";

include_once "App/Vistas/includes/header.php";

$data = $_SERVER['QUERY_STRING'];

switch ($data)
{
    case "Ingresar":
        include_once "App/Vistas/usuario/iniciar_sesion.php";
        break;

    case "Registrar":
        include_once "App/Vistas/usuario/usuario_registrar.php";
        break;

    case "Registrar_":
        include_once "App/Vistas/usuario/administrador_registrar.php";
        break;

    case "Listar":
        include_once "App/Vistas/usuario/administrador_listar.php";
        break;

    case "Actualizar":
        include_once "App/Vistas/usuario/administrador_actualizar.php";
        break;

    case "Pedido":
        include_once "App/Vistas/_Pedidos.php";
        break;

    case "AgregarPedido":
        include_once "App/Vistas/pedido/Add_Order.php";
        break;

    case "VerPedido":
        include_once "App/Vistas/pedido/View_Order.php";
        break;

    case "ActualizarPedido":
        include_once "App/Vistas/pedido/update_order.php";
        break;

    case "AgregarProducto":
        include_once "App/Vistas/detallepedido/Add_detallepedido.php";
        break;

    case "DetallesProducto":
        include_once "App/Vistas/detallepedido/View_detallepedido.php";
        break;

    default:
        include_once "App/Vistas/usuario/iniciar_sesion.php";
}
include_once "App/Vistas/includes/footer.php";
