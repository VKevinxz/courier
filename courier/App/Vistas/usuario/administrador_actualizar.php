<h1>Editar usuario</h1>
<?php use App\Controladores\ControladorUsuario;

$id = $_POST["id"];
$user = new ControladorUsuario();
$dato = $user->IdentificarUsuario($id); ?>

<form method="post" action="index.php?Actualizar">
    <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
    <label class="mb-3">Usuario:</label>
    <?php echo $dato["NombreUsuario"]; ?>

    <br>
    <label class="mb-3">Tipo:</label>
    <select class="form-control" name="tipo">
        <?php if ($dato["tipo"] == "Administrador") {
            echo '<option value="Administrador" selected>Administrador</option>';
            echo '<option value="Empleado">Empleado</option>';
            echo '<option value="Usuario">Usuario</option>';
        } else if ($dato["tipo"] == "Empleado") {
            echo '<option value="Administrador">Administrador</option>';
            echo '<option value="Empleado" selected>Empleado</option>';
            echo '<option value="Usuario">Usuario</option>';
        } else if ($dato["tipo"] == "Usuario") {
            echo '<option value="Administrador">Administrador</option>';
            echo '<option value="Empleado">Empleado</option>';
            echo '<option value="Usuario" selected>Usuario</option>';
        }
        ?>
    </select>
    <br>
    <input class="form-control" type="text" name="correo" placeholder="Correo" value="<?php echo $dato["correo"]; ?>">
    <br>
    <input class="form-control" type="number" name="telefono" placeholder="Telefono"
           value="<?php echo $dato["telefono"]; ?>">

    <br>
    <input class="form-control btn btn-primary" type="submit" name="submit" value="Guardar">
</form>
<button class="form-control btn btn-warning" id="cancelar_">Cancelar</button>
<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $tipo = $_POST["tipo"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $user->ModificarUsuario($tipo, $correo, $telefono);
    header("Location: index.php?Tienda_");
}

?>