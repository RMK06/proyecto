<?php
    require_once '../models/administradorM.php';
    class AdministradotC
    {
        public static function mostrarDatos()
        {
            $tabla = 'usuarios';
            return AdministradorM::buscarDatosM($tabla);
        }

        public static function mostrarCargos($idCargo)
        {
            $tabla = 'cargos';
            $id = $idCargo;
            return AdministradorM::buscarCargosM($tabla, $id);
        }

        public static function buscarId($idUsuario)
        {
            $tabla = 'usuarios';
            $usuario = $idUsuario;
            return AdministradorM::buscarId($tabla, $usuario);
        }
    }