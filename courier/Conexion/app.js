$(document).ready(function () {
    console.log("JS Activo");

    // Global
    $("#cancelar_").click(function () {
        window.location.href = "index.php?Tienda_"
    });

    $("#cerrar_sesion").click(function () {
        window.location.href = "cerrar.php"
    });

    // Index
    $("#iniciar_sesion").click(function () {
        window.location.href = "index.php?Ingresar"
    });

    $("#registrarse").click(function () {
        window.location.href = "index.php?Registrar"
    });

    // Administrador
    $("#crear_nuevo").click(function () {
        $("#account").load("index.php?Registrar_")
    });

    $("#ver_usuarios").click(function () {
        $("#account").load("index.php?Listar")
    });

    // Productos
    $("#crear_articulos").click(function () {
        $("#article").load("index.php?AgregarProducto")
    });

    $("#ver_articulos").click(function () {
        $("#article").load("index.php?DetallesProducto")
    });

    // Pedidos
    $("#Crear_pedido").click(function () {
        window.location.href = "index.php?AgregarPedido"
    });

    $("#DetallesPedido").click(function () {
        $("#list").load("index.php?VerPedido")
    });

    $("#Cambiarpedido").click(function () {
        $("#order").load("index.php?ActualizarPedido")
    });
});