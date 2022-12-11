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

        public static function modificarUsuarios()
        {
            $tabla = `usuarios`;
            return ColaboradoresM::modificarUsuariosM($_POST, $tabla);
        }

        public function eliminarColaborador()
        {
            $tabla = 'usuarios';
            $datos = $this->eliminarC;
            return ColaboradoresM::eliminarColaboradorM($datos, $tabla);
            
        }
    }
    if (isset($_POST['cedula_usuario'])) {
        $idEliminar = new ColaboradoresC();
        $idEliminar -> eliminarUsuario = $_POST;
        $idEliminar -> modificarUsuarios();
    }

    if (isset($_POST['id'])) {
        $idColaborador = new ColaboradoresC();
        $idColaborador -> eliminarC = $_POST['id'];
        $idColaborador -> eliminarColaborador();
    }