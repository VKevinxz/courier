<h1>Registrame</h1>
<form method="post" action="index.php?Registrar">
    <div class="mb-3">
        <label class="form-label">Nombres:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombres" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos:</label>
        <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required>
    </div>
    <div class="mb-3">
        <label class="form-label">DNI:</label>
        <input type="number" class="form-control" name="dni" placeholder="DNI" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo:</label>
        <input type="email" class="form-control" name="correo" placeholder="Correo" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña:</label>
        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Telefono:</label>
        <input type="number" class="form-control" name="telefono" placeholder="Telefono" required>
    </div>

    <br>
    <input type="submit" class="form-control btn btn-primary" name="registrarse" value="Registrarse">
</form>

<button class="form-control btn btn-secondary" id="iniciar_sesion">Iniciar</button>
<?php
if (isset($_POST["registrarse"])) {
    $user = new App\Controladores\ControladorUsuario();
    $user->CrearUsuario("Usuario", $_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["password"], $_POST["telefono"], $_POST["dni"]);
    header("Location: index.php?Ingresar");
}
?>