<?php
    require_once '../config/database.php';
    class ValidarPermisoM
    {
        public static function validarPermiso($table, $idUsuario)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $table
                                                WHERE `id_usuario` = :id ");
            $sql->bindParam(":id", $idUsuario, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            if (isset($datos)) {
                return $datos;
            } else {
                echo ' no hay datos';
            }
            $sql -> close();
        }
    }