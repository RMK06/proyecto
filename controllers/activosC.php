<?php
    require_once '../models/activosM.php';
    class ActivosC
    {
        public static function allActivos()
        {
            $tabla = 'activos';
            return ActivosM::allActivos($tabla);
        }
    }