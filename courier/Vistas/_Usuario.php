<div>
    <h1>Tienda</h1>
    <button class="btn btn-danger" id="cerrar_sesion">Cerrar sesión</button>
</div>
<?php

?>
<table class="table">
    <thead>
    <tr>
        <td scope="col">Nombre</td>
        <td scope="col">Precio</td>
        <td scope="col">Marca</td>
        <td scope="col">Descripcion</td>
        <td scope="col">Stock</td>
        <td scope="col">-</td>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Controladores\ControladorProducto;

    $prod = new ControladorProducto();

    foreach ($prod->VerProductos() as $item):
        echo "<tr>";
        echo sprintf("<td>%s</td>", $item['nombre']);
        echo sprintf("<td>%s</td>", $item['precio']);
        echo sprintf("<td>%s</td>", $item['marca']);
        echo sprintf("<td>%s</td>", $item['descripcion']);
        echo sprintf("<td>%s</td>", $item['stock']);
        echo '<td><form method="post" action="index.php?Tienda">';
        echo '<input type="hidden" name="id" value="' . $item["id"] . '">';
        echo '<button type="submit" name="poner_en_cesta" class="btn btn-primary">Añadir a la cesta</button>';
        echo "</form></td>";
        echo "</tr>";
    endforeach; ?>
    </tbody>
</table>