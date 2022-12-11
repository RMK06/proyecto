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
            AdministradorM::validarDocumentoM($table, $datos);
        }
        public function validarCorreo()
        {
            $table = 'usuarios';
            $datos = $this->validarC;
            return AdministradorM::validarCorreo($table, $datos);
        }

        public function agregarUsuario()
        {
            $table = 'usuarios';
            $datos = $this->agregarUsuario;
            return AdministradorM::agregarUsuarioM($table, $datos);
        }

        public function eliminarUsuario()
        {
            $table = 'usuarios';
            $id = $this->eliminarUsuario;
            return AdministradorM::eliminarUsuarioM($table, $id);
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

    if (isset($_POST['nombre_usuario'])) {
        $valUsuario = new AdministradotC();
        $valUsuario -> agregarUsuario = $_POST;
        $valUsuario -> agregarUsuario();
    }

    if (isset($_POST['id_usuario'])) {
        $idEliminar = new AdministradotC();
        $idEliminar -> eliminarUsuario = $_POST;
        $idEliminar -> eliminarUsuario();
    }

