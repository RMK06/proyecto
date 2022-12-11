<?php
    require_once '../config/database.php';
    class ActivosM
    {
        public static function allActivos($tabla)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla");
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function idColaboradorM($tabla, $id)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla WHERE id = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }

        public static function agregarActivoM($tabla, $datos)
        {
            $sql = Conexion::conect()->prepare("INSERT INTO $tabla(`nombre`, `serial`, `placa`, `tipo`, `marca`,
                                                `precio`, `detalles`, `estado`, `uso`)
                                                VALUES ('".$datos['Nombre']."','".$datos['Serial']."'
                                                ,'".$datos['Placa']."', '".$datos['Tipo']."',
                                                '".$datos['Marca']."','".$datos['Precio']."',
                                                '".$datos['Detalles']."','1','1') ");
            if ($sql->execute()) {
                echo 1;
            } else {
                echo 2;
            }

        }

        public static function deleteActivoM($tabla, $datos)
        {
            $sql = Conexion::conect()->prepare("DELETE FROM $tabla WHERE id = :id");
            $sql->bindParam(":id", $datos['id_activo'], PDO::PARAM_STR);
            if ($sql->execute()) {
                echo 1;
            } else {
                echo 2;
            }

        }

        public static function allActivoM($tabla, $datos)
        {
            $sql = Conexion::conect()->prepare("SELECT * FROM $tabla WHERE `id` = :id");
            $sql->bindParam(":id", $datos['idActivo'], PDO::PARAM_STR);
            $sql->execute();
            while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            echo json_encode($datos);
        }

    }
