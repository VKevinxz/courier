<h1>Cambiar Pedido</h1>
<?php

use App\Controladores\ControladorPedido;

if (isset($_POST["actualizar"])) {
    $id = $_POST["ID"];
    $estado = $_POST["Estado"];
    $pedidos = new ControladorPedido();
    $pedidos->ActualizarEstadoPedido($id, $estado);
    header("location:index.php?Pedido");
}
?>
<form method="post" action="index.php?ActualizarPedido">
    <div class="mb-3">
        <label class="form-label">ID</label>
        <input type="number" class="form-control" name="ID" placeholder="ID" required>
    </div>
    <br>
    <div class="mb-3">
        <label class="form-label">Estado</label>
        <input type="text" class="form-control" name="Estado" placeholder="Estado" required>
    </div>
    <br>
    <input type="submit" class="form-control btn btn-primary" name="actualizar" value="actualizar">
</form>
