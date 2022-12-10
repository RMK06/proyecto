<?php
    require_once '../models/colaboradoresM.php';
    class ColaboradoresC
    {
        public static function allColaboradoresC()
        {
            $tabla = 'usuarios';
            return ColaboradoresM::allColaboradoresM($tabla);
        }

        public static function cargosId($id)
        {
            $tabla = 'cargos';
            return ColaboradoresM::cargosId($id, $tabla);
        }
    }