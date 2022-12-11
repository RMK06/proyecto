<?php
    require_once '../models/activosM.php';
    class ActivosC
    {
        public static function allActivos()
        {
            $tabla = 'activos';
            return ActivosM::allActivos($tabla);
        }

        public static function activosAsignados()
        {
            $tabla = 'activo_asignado';
            return ActivosM::allActivos($tabla);
        }

        public static function idColaborador($id)
        {
            $tabla = 'usuarios';
            return ActivosM::idColaboradorM($tabla, $id);
        }
    }