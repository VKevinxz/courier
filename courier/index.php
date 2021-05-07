<?php

session_start();
include_once "Conexion/autoload.php";

include_once "App/Vistas/includes/header.php";

$data = $_SERVER['QUERY_STRING'];

switch ($data)
{

    case "Ingresar":
        include_once "Vistas/usuario/iniciar_sesion.php";
        break;

    case "Registrar":
        include_once "Vistas/usuario/usuario_registrar.php";
        break;

    case "Tienda":
        include_once "Vistas/_Usuario.php";
        break;

    case "Tienda_":
        include_once "Vistas/_Administrador.php";
        break;

    case "Registrar_":
        include_once "Vistas/usuario/administrador_registrar.php";
        break;

    case "Listar":
        include_once "Vistas/usuario/administrador_listar.php";
        break;

    case "Actualizar":
        include_once "Vistas/usuario/administrador_actualizar.php";
        break;

    case "Pedido":
        include_once "Vistas/_Pedidos.php";
        break;

    case "AgregarPedido":
        include_once "Vistas/pedido/Add_Order.php";
        break;

    case "VerPedido":
        include_once "Vistas/pedido/View_Order.php";
        break;

    case "ActualizarPedido":
        include_once "Vistas/pedido/update_order.php";
        break;

    case "AgregarProducto":
        include_once "Vistas/producto/Add_Product.php";
        break;

    case "DetallesProducto":
        include_once "Vistas/producto/View_Product.php";
        break;
    default:
        include_once "Vistas/usuario/iniciar_sesion.php";
}
include_once "Vistas/includes/footer.php";
