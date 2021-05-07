<?php

namespace App\Clases;

use Conexion\ConexionBD as Conexion;
use PDO;
use PDOException;

include_once "Conexion/autoload.php";

class Usuario
{
    public function ComprobarCorreoDisponible($correo) {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $SQL = "SELECT correo FROM usuario WHERE correo='$correo'";
            $stmt = $conn->prepare($SQL);
            $stmt->execute();

            $check = false;
            foreach ($stmt->fetchAll() as $user):
                if ($user['correo'] == $correo) {
                    $check = true;
                }
            endforeach;
            return $check;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insertar(string $tipo, string $nombres, string $apellidos, string $correo, string $password, int $telefono, int $dni) {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            if ($this->ComprobarCorreoDisponible($correo) == false) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuario (tipo, nombres, apellidos, correo, contraseña, telefono, dni) VALUES (?,?,?,?,?,?,?)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $tipo, PDO::PARAM_STR);
                $stmt->bindParam(2, $nombres, PDO::PARAM_STR);
                $stmt->bindParam(3, $apellidos, PDO::PARAM_STR);
                $stmt->bindParam(4, $correo, PDO::PARAM_STR);
                $stmt->bindParam(5, $hash, PDO::PARAM_STR);
                $stmt->bindParam(6, $telefono, PDO::PARAM_INT);
                $stmt->bindParam(7, $dni, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = true;
            } else {
                $resultado = false;
            }
            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function LeerUno(string $correo, string $contrasenia)
    {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();

            $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $check = 0;
            foreach ($stmt->fetchAll() as $user):
                if (password_verify($contrasenia, $user['contraseña']) == 1) {
                    $check = $user['tipo'];
                }
            endforeach;
            return $check;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Listar()
    {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM usuario";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Eliminar($id)
    {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "DELETE FROM usuario WHERE id = $id";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function IdentificarCuenta(int $id){
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT id, concat(nombres, ' ', apellidos) as NombreUsuario, correo, telefono, tipo FROM usuario WHERE dni = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function Actualizar(string $tipo, string $correo, int $telefono) {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "UPDATE usuario SET tipo='$tipo', telefono=$telefono WHERE correo='$correo'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->rowCount();
            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
