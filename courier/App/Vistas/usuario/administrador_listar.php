<?php use App\Controladores\ControladorUsuario;

$user = new ControladorUsuario(); ?>
    <br>
    <table border="2px" class="table">
        <thead>
        <td scope="col">ID</td>
        <td scope="col">Tipo</td>
        <td scope="col">Nombre</td>
        <td scope="col">Apellido</td>
        <td scope="col">Correo</td>
        <!--td scope="col">Contraseña</td-->
        <td scope="col">Telefono</td>
        <td scope="col">DNI</td>
        <td scope="col-span-2">Opciones</td>
        <td></td>
        </thead>
        <tbody>
        <?php
        foreach ($user->ListarUsuario() as $user) {
            echo "<tr>";
            echo '<th scope="row">' . $user["id"] . '</th>';
            echo '<td>' . $user["tipo"] . '</td>';
            echo '<td>' . $user["nombres"] . '</td>';
            echo '<td>' . $user["apellidos"] . '</td>';
            echo '<td>' . $user["correo"] . '</td>';
            //echo '<td>' . $user["contraseña"] . '</td>';
            echo '<td>' . $user["telefono"] . '</td>';
            echo '<td>' . $user["dni"] . '</td>';

            // Editar
            echo '<td><form method="post" action="index.php?Actualizar">';
            echo '<input type="hidden" name="id" value="' . $user["id"] . '">';
            echo '<button type="submit" name="editar" class="btn btn-success">Editar</button> ';
            echo "</form></td>";

            // Eliminar
            echo '<td><form method="post" action="index.php?Listar">';
            echo '<input type="hidden" name="id" value="' . $user["id"] . '">';
            echo '<button type="submit" name="eliminar" class="btn btn-warning">Eliminar</button>';
            echo "</form></td>";
            echo "</tr>";
        } ?>
        </tbody>
    </table>
<?php
if (isset($_POST["editar"])) {
    $user = new ControladorUsuario();
}

if (isset($_POST["eliminar"])) {
    $user = new ControladorUsuario();
    $user->EliminarUsuario($_POST["id"]);
    header("Location: index.php?Tienda_");
}
