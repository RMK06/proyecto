<?php
    require_once '../config/database.php';
    class AdministradorM
    {
        public static function buscarDatosM($tabla)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla WHERE `acceso` = 1");
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function buscarCargosM($tabla, $id)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla WHERE `id` = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function buscarId($tabla, $usuario)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla WHERE `id` = :id");
            $sql->bindParam(":id", $usuario, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function busquedAllM($idCargo, $table)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $table WHERE `id` = :id");
            $sql->bindParam(":id", $idCargo, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function allM($table)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $table ");
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function cargoIdM($table, $id)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $table WHERE `id_usuario` = :idUsuario");
            $sql->bindParam(":idUsuario", $id, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function validarDocumento($table, $doc)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $table WHERE `cedula` = :cedula");
            $sql->bindParam(":cedula", $doc, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            if (isset($datos)) {
                echo 1;
            } else {
                echo 2;
            }
        }

        public static function validarCorreo($table, $correo)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $table WHERE `correo` = :correo");
            $sql->bindParam(":correo", $correo, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            if (isset($datos)) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }