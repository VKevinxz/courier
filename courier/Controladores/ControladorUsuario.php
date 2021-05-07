<?php

namespace Controladores;

use Clases\Usuario;

include_once "Conexion/autoload.php";

class ControladorUsuario
{
    public function CrearUsuario(string $tipo, string $nombres, string $apellidos, string $correo, string $password, int $telefono, int $dni)
    {
        $user = new Usuario();
        $result = $user->Insertar($tipo, $nombres, $apellidos, $correo, $password, $telefono, $dni);
        if ($result == true) {
            echo "Guardado";
        }
        if ($result == false) {
            echo "Correo en uso";
        }
    }

    public function IniciarSesion($correo, $contrasenia)
    {
        $user = new Usuario();
        return $user->LeerUno($correo, $contrasenia);
    }

    public function ListarUsuario()
    {
        $user = new Usuario();
        return $user->Listar();
    }

    public function IdentificarUsuario($id)
    {
        $user = new Usuario();
        foreach ($user->IdentificarCuenta($id) as $account):
            return $account;
        endforeach;
    }

    public function ModificarUsuario(string $tipo, string $correo, int $telefono)
    {
        $user = new Usuario();
        $user->Actualizar($tipo, $correo, $telefono);
    }

    public function EliminarUsuario($id)
    {
        $user = new Usuario();
        $user->Eliminar($id);
    }
}
