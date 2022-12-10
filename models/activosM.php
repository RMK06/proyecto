<?php
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
    }
