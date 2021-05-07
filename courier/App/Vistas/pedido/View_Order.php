<h1>Detalle de pedido</h1>
<?php

use App\Controladores\ControladorPedido as Pedido;

$pedido = new Pedido();
$Pedidos = $pedido->mostrarPedidosporEstado("Pendiente"); ?>
<br>
<table border="2px" class="table">
    <thead>
    <td scope="col">ID</td>
    <td scope="col">Cliente</td>
    <td scope="col">DNI</td>
    <td scope="col">Ubicación</td>
    <td scope="col">Fecha Pedido</td>
    <!--td scope="col">Contraseña</td-->
    <td scope="col">Fecha Entrega</td>
    <td scope="col">Cantidad</td>
    <td scope="col">Estado</td>
    <td scope="col">Lista</td>
    <td></td>
    </thead>
    <tbody>
<?php
foreach ($Pedidos as $documentos):
    echo "<tr>";
    echo '<td>' . $documentos['id'] . '</td>';
    echo '<th scope="row">' . $documentos['cliente'] . '</th>';
    echo '<td>' . $documentos['dnicliente'] . '</td>';
    echo '<td>' . $documentos['ubicacion'] . '</td>';
    echo '<td>' . $documentos['fechapedido'] . '</td>';
    echo '<td>' . $documentos['fechaentrega'] . '</td>';
    echo '<td>' . $documentos['cantidad'] . '</td>';
    echo '<th scope="row">' . $documentos['estado'] . '</th>';
    echo '<td>' . $documentos['lista'] . '</td>';
    echo "</tr>";
endforeach; ?>
    </tbody>
</table>
