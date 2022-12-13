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

        public static function activoId($id)
        {
            $tabla = 'activos';
            return ActivosM::idColaboradorM($tabla, $id);
        }

        public static function idColaborador($id)
        {
            $tabla = 'usuarios';
            return ActivosM::idColaboradorM($tabla, $id);
        }

        public function agregarActivo()
        {
            $tabla = 'activos';
            $datos = $this->datosActivo;
            ActivosM::agregarActivoM($tabla, $datos);
        }

        public function deleteActivo()
        {
            $tabla = 'activos';
            $datos = $this->id_activo;
            return ActivosM::deleteActivoM($tabla, $datos);
        }

        public function allActivo()
        {
            $tabla = 'activos';
            $datos = $this->activo;
            return ActivosM::allActivoM($tabla, $datos);
        }

        public function updateActivo()
        {
            $tabla = 'activos';
            $datos = $this->updateActivo;
            return ActivosM::updateActivoM($tabla, $datos);
        }
    }

    if (isset($_POST['SerialActivo'])) {
        $agregarA = new ActivosC();
        $agregarA -> datosActivo = $_POST;
        $agregarA -> agregarActivo();
    }
    if (isset($_POST['id_activo'])) {
        $deletactivo = new ActivosC();
        $deletactivo -> id_activo = $_POST;
        $deletactivo -> deleteActivo();
    }

    if (isset($_POST['idActivo'])) {
        $idActivo = new ActivosC();
        $idActivo -> activo = $_POST;
        $idActivo -> allActivo();
    }

    if (isset($_POST['Activo'])) {
        $update = new ActivosC();
        $update -> updateActivo = $_POST;
        $update -> updateActivo();
    }