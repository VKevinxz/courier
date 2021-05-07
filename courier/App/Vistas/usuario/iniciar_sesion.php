<h1>Iniciar sesión</h1>
<form method="post" action="index.php?Ingresar">
    <label class="mb-3">Correo:</label><br>
    <input type="text" class="form-control" name="correo" placeholder="usuario@correo.com" required><br>

    <label class="mb-3">Contraseña: </label><br>
    <input type="password" class="form-control" name="password" required><br>

    <br>
    <input type="submit" class="form-control btn btn-primary" name="iniciar" value="Ingresar">
</form>

<button class="form-control btn btn-secondary" id="registrarse">Registrarse</button>

<?php
if (isset($_POST["iniciar"])) {
    if ($_POST["correo"] && $_POST["password"]) {
        $user = new App\Controladores\ControladorUsuario();
        $tipo = $user->IniciarSesion($_POST["correo"], $_POST["password"]);
        if ($tipo == "Administrador") {
            header("Location: index.php?Tienda_");
        }
        if ($tipo == "Usuario") {
            header("Location: index.php?Pedido");
        }
    }
}
?>
