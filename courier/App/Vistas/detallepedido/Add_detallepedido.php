<h1>Agregar producto</h1>
<form method="post" action="index.php?AgregarPedido">
    <label class="form-label">Producto: </label>
    <input type="text" class="form-control" name="pedido" placeholder="Nombre del pedido"><br>
    <label class="form-label">Descripción: </label>
    <input type="text" class="form-control" name="descripcion" placeholder="Descripcion del pedido"><br>
    <label class="form-label">Precio: </label>
    <input type="text" class="form-control" name="precio" placeholder="Precio"><br>
    <label class="form-label">Marca: </label>
    <input type="text" class="form-control" name="marca" placeholder="Marca"><br>
    <label class="form-label">Unidades disponibles: </label>
    <select name="tipo" class="form-control">

    </select><br>
    <input type="submit" class="form-control btn btn-primary" name="submit" value="Verificar y añadir">
</form>
<?php
if (isset($_POST["submit"])) {
    $prod = new \App\Clases\detallepedido();
    $prod->agregarPedido($_POST["tipo"], $_POST["detallepedido"], $_POST["descripcion"], $_POST["precio"], $_POST["marca"]);
    header("Location: index.php?Tienda_");
}
?>