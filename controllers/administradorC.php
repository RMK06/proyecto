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

        public static function busquedAll($id, $tabla)
        {
            $idCargo = $id;
            $table = $tabla;
            return AdministradorM::busquedAllM($idCargo, $table);
        }

        public static function all($tabla)
        {
            $table = $tabla;
            return AdministradorM::allM($table);
        }

        public static function cargoIdC($idUsuario)
        {
            $id = $idUsuario;
            $table = 'permisos';
            return AdministradorM::cargoIdM($table, $id);
        }

        public function validarDocumento()
        {
            $table = 'usuarios';
            $datos = $this->validarD;
            return AdministradorM::validarDocumento($table, $datos);
        }
        public function validarCorreo()
        {
            $table = 'usuarios';
            $datos = $this->validarC;
            return AdministradorM::validarCorreo($table, $datos);
        }
    }
    if (isset($_POST['numero_usuario'])) {
        $valUsuario = new AdministradotC();
        $valUsuario -> validarD = $_POST['numero_usuario'];
        $valUsuario -> validarDocumento();
    }
    if (isset($_POST['correo'])) {
        $valUsuario = new AdministradotC();
        $valUsuario -> validarC = $_POST['correo'];
        $valUsuario -> validarCorreo();
    }