<h1>Añadir a la lista</h1>
<?php

use App\Clases\Pedido;
use App\Clases\Usuario;
use App\Controladores\Controladordetallepedido;

$slots = new \App\Controladores\ControladorSlot();
$producto = new Controladordetallepedido();
$usuario = new Usuario();
$pedido = new Pedido();
$slot = new \App\Clases\Slot();

$dni = "";
$ubicacion = "";
$fecha = "";

if ($_POST["dni"] != "") {$dni = $_POST["dni"];}
if ($_POST["ubicacion"] != "") {$ubicacion = $_POST["ubicacion"];}
if ($_POST["fecha_pedido"] != "") {$fecha = $_POST["fecha_pedido"];}

?>
<form method="post" action="index.php?AgregarPedido">
    <label class="mb-3">DNI: </label>
    <input type="text" class="form-control" name="dni" placeholder="Ingrese DNI" value="<?php echo $dni ?>"><br>
    <label class="mb-3">Lugar de recojo:</label>
    <select class="form-control" name="ubicacion">
    <?php foreach ($slot->MostrarSlots("Disponible") as $opciones):
        echo sprintf("<option value=%s>Ranura %s</option>", $opciones["ID"], $opciones['ID']);
    endforeach; ?>
    </select>
    <br>
    <label class="mb-3">Fecha de pedido:</label>
    <input type="date" name="fecha_pedido" value="<?php echo $fecha ?>">
    <input type="hidden" name="fecha_entrega" value="2020-01-01 00:00:00"><br>
    <label class="mb-3">Producto:</label>
    <select class="form-control" name="articulo" id="articulo">
        <?php foreach ($producto->VerProductos() as $opciones):
            echo sprintf("<option value=%s>%s</option>", $opciones['nombre'], $opciones['nombre']);
        endforeach; ?>
    </select>
    <br>
    <input type="hidden" name="estado" value="Pendiente">
    <br>
    <input class="form-control btn btn-primary" type="submit" name="agregar" value="Añadir al carrito">
    <input class="form-control btn btn-success" type="submit" name="comprar" value="Finalizar y realizar compra">
</form>

<?php
if (isset($_POST["agregar"])){
    $dni = $_POST["dni"];
    $ubicacion = $_POST["ubicacion"];
    $fecha = $_POST["fecha_pedido"];

    $slots->AgregarLista($ubicacion, $_POST["articulo"]);
}

if ($ubicacion != "") {
    echo $slot->VerContenido($ubicacion);
}

if (isset($_POST["comprar"])) {
    $dni = $_POST["dni"];
    $lista = $slot->VerContenido($ubicacion);

    foreach ($usuario->IdentificarCuenta($dni) as $dato):
        $pedido->agregarPedido($dato['NombreUsuario'], $_POST['dni'], $_POST['ubicacion'],
            $_POST['fecha_pedido'], $_POST['fecha_entrega'], 1,
            15, $_POST['estado'], $lista);
    endforeach;
    header("Location: index.php?Pedido");
}
?>