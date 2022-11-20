<?php
    require_once '../models/validarPermisoM.php';
    class ValidarPermiso
    {
        public static function validar($a)
        {
            $table = 'permisos';
            $idUsuario = $a;
            return ValidarPermisoM::validarPermiso($table, $idUsuario);
        }
    }