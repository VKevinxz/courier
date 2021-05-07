<div>
    <h1>Tienda</h1>
    <button class="btn btn-danger" id="cerrar_sesion">Cerrar sesión</button>
</div>
<!--Todo: Lista de articulos-->
<table class="table">
    <thead>
    <tr>
        <td scope="col">Nombre</td>
        <td scope="col">Precio</td>
        <td scope="col">Marca</td>
        <td scope="col">Descripcion</td>
        <td scope="col">-</td>
    </tr>
    </thead>
    <tbody>
    <?php

    use App\Controladores\Controladordetallepedido;

    $prod = new Controladordetallepedido();

    foreach ($prod->VerProductos() as $item):
        echo "<tr>";
        echo sprintf("<td>%s</td>", $item['nombre']);
        echo sprintf("<td>%s</td>", $item['precio']);
        echo sprintf("<td>%s</td>", $item['marca']);
        echo sprintf("<td>%s</td>", $item['descripcion']);
        echo "<td><button class='btn btn-primary'>Añadir a la cesta</td>";
        echo "</tr>";
    endforeach; ?>
    </tbody>
</table>