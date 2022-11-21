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
    }